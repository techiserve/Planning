<?php

namespace App\Exports;

use Spatie\Activitylog\Models\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LogsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Activity::all(); // Fetch all users
    }

    public function map($user): array
    {
        return [
        
            $user->user_name,
            $user->user_email,
            $user->description,
            $user->created_at->format('Y-m-d H:i:s'), // Example of formatting
        ];
    }

    /**
     * Define the headings.
     */
    public function headings(): array
    {
        return [
           
            'Name',
            'Email',
            'Activity',
            'Created At',
        ];
    }
}
