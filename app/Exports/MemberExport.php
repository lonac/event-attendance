<?php

namespace App\Exports;

use App\Models\Member;
use App\Models\MaritalStatus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MemberExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Return the collection of data to export
     * 
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Member::with('maritalStatus')->get(); // Eager load marital status
    }

    /**
     * Define the headings for the Excel file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'First Name',
            'Last Name',
            'Phone Number',
            'Attend',
            'Marital Status',
        ];
    }

    /**
     * Map the data for each row to export.
     *
     * @param \App\Models\Member $member
     * @return array
     */
    public function map($member): array
    {
        return [
            $member->firstname,
            $member->lastname,
            $member->phone_number,
            $member->attend ? 'Yes' : 'No', // Convert 0/1 to Yes/No
            $member->maritalStatus ? $member->maritalStatus->name : 'N/A', // Get marital status name
        ];
    }
}