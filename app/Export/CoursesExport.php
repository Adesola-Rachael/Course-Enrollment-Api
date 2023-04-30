<?php

namespace App\Export;
use App\Models\Course;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CoursesExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
     * return data to be inserted into sheet
     *
    */
    public function collection()
    {
        return Course::all();
    }

    /**
     * @return array
    */
    public function headings(): array
    {
        return ["Sn", "Title", "Category", "Course Code", "Text", "Date Created" , "Date Updated"];
    }
}