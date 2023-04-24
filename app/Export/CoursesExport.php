<?php

namespace App\Export;
use App\Course;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CoursesExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Course::all();

    }
    public function headings() :array
    {
        return ["Sn", "Title", "Category","Course Code", "Text","Date Created" ,"Date Updated"];
    }
}