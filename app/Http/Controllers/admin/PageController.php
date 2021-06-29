<?php

namespace App\Http\Controllers\admin;

use App\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    private $numbersWord = [
        '1' => 'یک', '2' => 'دو', '3' => 'سه', '4' => 'چهار', '5' => 'پنج',
        '6' => 'شش', '7' => 'هفت', '8' => 'هشت', '9' => 'نه',
    ];

    public function index()
    {
        $pages = Page::query()->orderBy('created_at')->get();
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'body' => 'required',
                'RadioCol' => 'required|numeric',
                'checkboxRow' => 'required|numeric',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000' // max 10000kb,
            ], [
                'RadioCol.required' => 'لطفا :attribute را انتخاب نمایید.',
                'checkboxRow.required' => 'لطفا :attribute را انتخاب نمایید.',
            ], [
                'title' => 'عنوان صفحه',
                'body' => 'جزئیات صفحه',
                'RadioCol' => 'ستون',
                'checkboxRow' => 'سطر',
            ]);

        $dash = DIRECTORY_SEPARATOR;
        $img = $request->file('image');
        $fileName = date('H-i-s') . '-' . $img->getClientOriginalName();
        $destDirectory = 'public' . $dash . 'assets' . $dash . 'img' . $dash . 'pages';
        $img->move($destDirectory, $fileName);
        $imgPath = $destDirectory . $dash . $fileName;
        $imgPathUrl = asset($imgPath);

        $col = $request->RadioCol;
        $row = $request->checkboxRow;
        $locationName = 'فوتر-ستون ' . $this->numbersWord[$col] . '-سطر ' . $this->numbersWord[$row];

        $page = Page::create([
            'title' => $request->title,
            'title2' => $request->title2,
            'body' => $request->body,
            'locationName' => $locationName,
            'locationValue' => $col . $row,
            'imgUrl' => $imgPathUrl,
            'col' => $col,
            'row' => $row,
        ]);

        return back()->with(['insertPage'=>'صفحه مورد نظر با موفقیت ساخته شد.']);
    }

    public function imageUpload()
    {
        $this->validate(request(), [
            'upload' => 'required|mimes:jpeg,jpg,png,gif,bmp' // max 10000kb,
        ], [], ['upload' => 'عکس ارسالی']);

        $dash = DIRECTORY_SEPARATOR;
        $img = request()->file('upload');
        $fileName = date('H-i-s') . '-' . $img->getClientOriginalName();
        $destDirectory = 'public' . $dash . 'assets' . $dash . 'img' . $dash . 'pages';
        $img->move($destDirectory, $fileName);

        $imgPath = $destDirectory . $dash . $fileName;
        $imgPathUrl = asset($imgPath);

        /*
        $month = Carbon::now()->month;
        $imagePath = "/assets/img/pages/{$month}/";

        $file = request()->file('upload');
        $fileName = $file->getClientOriginalName();

        if (file_exists(public_path($imagePath, $fileName))) {
            $fileName = Carbon::now()->timestamp . $fileName;
        }

        $file->move(public_path($imagePath), $fileName);
        $url = $imagePath . $fileName;
        //*/
        return "<script>window.parent.CKEDITOR.tools.callFunction(1,'{$imgPathUrl}','')</script>";

    }

    public function update(Page $page, $col, $row, $col_new, $row_new)
    {
        $errRow = false;
        $exceedsLimitRow = false;
        $pages = Page::all();
        $number_of_max_row = $pages->max('row') + 1;

        if ($row_new <= ($number_of_max_row)) {

            $pageOtherColOther = Page::where('col', $col_new)->where('row', $row_new)->first();  // پیج هایی ک ستون مثل هم ندارند!
            $numberOfRowLessThanNewRow = count(Page::where('col', $col_new)->where('row', '<', $row_new)->get());

            if (!$pageOtherColOther) {
                $pageOtherColOther = Page::where('col', $col_new)->get();
                $numberOfRowLessThanNewRow = count($pageOtherColOther);
                $pageOtherColOther = $pageOtherColOther->first();
            }
//            dump($pageOtherColOther);

            $pageOtherColSame = null;
            if ($col == $col_new)
                $pageOtherColSame = Page::where('id', '!=', $page->id)->where('col', $col)->where('row', $row_new)->first();  // پیج هایی ک ستون مثل هم دارند!


            $pageHasColOther = null;
            if (!$pageOtherColOther) {
                $pageHasColOther = Page::where('col', $col_new)->first();  // آیا در ستون جدید، پیجی هست یا خیر!
            }
            if ($pageOtherColSame) {
//                dd('ta hame ja');
                DB::beginTransaction();
                $pageOtherColSame->update([
                    'col' => $col,
                    'row' => $row,
                ]);

                $page->update([
                    'col' => $col_new,
                    'row' => $row_new,
                ]);
                DB::commit();
            } elseif ($pageOtherColOther) {
                DB::beginTransaction();
                //خود سطر و تمام سطرهای پایین تر از خود، باید یک واحد به مقدار سطرشان، اضافه شود
                $pagesRow = Page::where('col', $pageOtherColOther->col)->where('row', '>', $pageOtherColOther->row)->get();
//                dd('ta inja');
                $rowForOther = $pageOtherColOther->row + 1;

                if ($row_new <= $pageOtherColOther->row) {
                    $pageOtherColOther->update([
                        'row' => $rowForOther,
                    ]);
                }

                for ($i = 0; $i < count($pagesRow); $i++) {
                    $rowForOther = $rowForOther + 1;
                    $pagesRow[$i]->update([
                        'row' => $rowForOther,
                    ]);
                }

                //تمام سطرهای پایین تر از خود، باید یک واحد از مقدار سطرشان، کسر شود
                $pagesRow = Page::where('col', $page->col)->where('row', '>', $page->row)->get();
                $page->update([
                    'col' => $col_new,
                    'row' => $numberOfRowLessThanNewRow + 1,
                ]);
                for ($i = 0; $i < count($pagesRow); $i++) {
                    $pagesRow[$i]->update([
                        'row' => ($pagesRow[$i]->row - 1),
                    ]);
                }
                DB::commit();
            } elseif ($pageHasColOther) {       //  سطرهای دیگری هم در این ستون هستند!

                DB::beginTransaction();
                $page->update([
                    'col' => $col_new,
                    'row' => $row_new,
                ]);
                //  در این ستون، سطرهایی را پیدا می کنیم که، شماره سطرشان، از سطر آمده به این ستون، بزرگتر باشد و
                // حتمن هم چک میکنیم مقدار سطر وارد شده، بیشتر از ماکسیسم سطر داخل این ستون نباشد.
                $pagesAllThisCol = Page::where('col', $col_new)->get();

                if ($pagesAllThisCol) {
                    $number_of_max_row_this_col = $pagesAllThisCol->max('row');
                    if ($row_new < $number_of_max_row_this_col + 1) {
                        //فردا باید اینجا کار کنم ک خود سطر جدید را اپدیت کنم و سطرهای بیشتر را هم در این ستون، شماره سطرشونو آپدیت کنم.
                        $page->update([
                            'col' => $col_new,
                            'row' => $row_new,
                        ]);
//                        $pagesRow = Page::where('col', $col_new)->where('row', '>', $row_new)->get();
//                        $rowForOther = $pageOtherColOther->row + 1;
//                        $pageOtherColOther->update([
//                            'row' => $rowForOther,
//                        ]);
//                        for ($i = 0; $i < count($pagesRow); $i++) {
//                            $rowForOther = $rowForOther + 1;
//                            $pagesRow[$i]->update([
//                                'row' => $rowForOther,
//                            ]);
//                        }
                    } else {
                        // شماره سطر وارد شده، غیر معقول هست!
                    }

                } else {      //  سطر جدید آمده به عنوان اولین سطر در این ستون، محسوب خواهد شد.
                    $page->update([
                        'col' => $col_new,
                        'row' => 1,
                    ]);
                }


                DB::commit();
            } elseif (!$pageHasColOther) {      //  هیچ سطری در این ستون نیست!
                DB::beginTransaction();
                $page->update([
                    'col' => $col_new,
                    'row' => 1,
                ]);

                //تمام سطرهای پایین تر از خود در ستون مبدا، باید یک واحد از مقدار سطرشان، کسر شود
                $pagesRow = Page::where('col', $col)->where('row', '>', $row)->get();

                for ($i = 0; $i < count($pagesRow); $i++) {
                    $pagesRow[$i]->update([
                        'row' => ($pagesRow[$i]->row - 1),
                    ]);
                }
                DB::commit();
            } else {
                $errRow = true;
            }
        } else {
            $exceedsLimitRow = true;
        }


        //  sending response
        $cols = $this->getAllCols();

        return response([
                'col11' => $cols[0], 'col22' => $cols[1], 'col33' => $cols[2],
                'elementNewIdAlert' => 'save' . $col_new . $row_new,
                'elementOldIdAlert' => 'save' . $col . $row,
                'errRow' => $errRow,
                'exceedsLimitRow' => $exceedsLimitRow,
                'numberOfMaxRow' => $number_of_max_row,
            ]
            , 200);
    }

    public function delete(Page $page, $col, $row)
    {
        DB::beginTransaction();

        $page->delete();
        $pages = Page::where('col', $col)->get();
        for ($i = 0; $i < count($pages); $i++) {
            $pages[$i]->update([
                'row' => $i + 1
            ]);
        }

        DB::commit();


        return $this->getAllColRow();
    }

    public function addRowInPage($col)
    {
        $pages = DB::table('pages')->where('col', $col)->get();
        if ($pages) {
            $currentMaxRow = $pages->max('row');
            $currentRow = $currentMaxRow + 1;
        } else {
            $currentRow = 1;        //  یعنی سطر اول
        }

        $rowWord = $this->numbersWord[$currentRow];
        return response(['number' => $currentRow, 'numberWord' => $rowWord], 200);
    }

    public function getAllColRow()
    {
        $cols = $this->getAllCols();

        return response(
            ['col11' => $cols[0], 'col22' => $cols[1], 'col33' => $cols[2],]
            , 200);
    }

    private function getAllCols()
    {
        $pages = Page::orderBy('row')->get();
        $col1 = $col2 = $col3 = [];
        $i1 = $i2 = $i3 = 0;
        foreach ($pages as $page) {
            if ($page->col == 1) {
                $col1[$i1]['title'] = $page->title;
                $col1[$i1]['row'] = $page->row;
                $i1++;
            } elseif ($page->col == 2) {
                $col2[$i2]['title'] = $page->title;
                $col2[$i2]['row'] = $page->row;
                $i2++;
            } elseif ($page->col == 3) {
                $col3[$i3]['title'] = $page->title;
                $col3[$i3]['row'] = $page->row;
                $i3++;
            }
        }
        return [$col1, $col2, $col3];
    }
}