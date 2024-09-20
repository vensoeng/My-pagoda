<?php

if (!function_exists('englishToKhmer')) {
    /**
     * Convert English numbers to Khmer.
     *
     * @param  int|string  $number
     * @return string
     */
    function englishToKhmer($number)
    {
        $khmerNumbers = [
            '0' => '០',
            '1' => '១',
            '2' => '២',
            '3' => '៣',
            '4' => '៤',
            '5' => '៥',
            '6' => '៦',
            '7' => '៧',
            '8' => '៨',
            '9' => '៩',
        ];

        $khmerNumber = '';

        $englishNumberString = strval($number);
        $englishNumberArray = str_split($englishNumberString);

        foreach ($englishNumberArray as $digit) {
            if (isset($khmerNumbers[$digit])) {
                $khmerNumber .= $khmerNumbers[$digit];
            } else {
                $khmerNumber .= $digit; // If the digit is not found in the mapping, keep it as it is.
            }
        }

        return $khmerNumber;
    }
}

if (!function_exists('dateKhmerNumber')) {
    function dateKhmerNumber($date)
    {
        // Convert the date string to a DateTime object
        $dateObject = new DateTime($date);

        // Khmer digits
        $khmerDigits = ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];

        // Khmer months
        $khmerMonths = [
            '01' => 'មករា',
            '02' => 'កម្ភៈ',
            '03' => 'មីនា',
            '04' => 'មេសា',
            '05' => 'ឧសភា',
            '06' => 'មិថុនា',
            '07' => 'កក្កដា',
            '08' => 'សីហា',
            '09' => 'កញ្ញា',
            '10' => 'តុលា',
            '11' => 'វិច្ឆិកា',
            '12' => 'ធ្នូ'
        ];

        // Extract year, month, day
        $year = $dateObject->format('Y');
        $month = $dateObject->format('m');
        $day = $dateObject->format('d');

        // Convert numbers to Khmer digits
        $khmerYear = '';
        foreach (str_split($year) as $digit) {
            $khmerYear .= $khmerDigits[$digit];
        }

        $khmerDay = '';
        foreach (str_split($day) as $digit) {
            $khmerDay .= $khmerDigits[$digit];
        }

        // Build the final string
        $khmerDate = 'ថ្ងៃទី' . $khmerDay . ' ខែ' . $khmerMonths[$month] . ' ឆ្នាំ' . $khmerYear;

        return $khmerDate;
    }
}
if(!function_exists('formatDateTime'))
{
    function formatDateTime($datetime)
    {
        $time = \Carbon\Carbon::parse($datetime)->format('h:i A');

        // Replace English numbers with Khmer numbers
        $khmerNumbers = [
            '0' => '០',
            '1' => '១',
            '2' => '២',
            '3' => '៣',
            '4' => '៤',
            '5' => '៥',
            '6' => '៦',
            '7' => '៧',
            '8' => '៨',
            '9' => '៩'
        ];
        $formattedTime = strtr($time, $khmerNumbers);

        // Replace AM/PM with Khmer equivalents
        $formattedTime = str_replace('AM', 'ព្រឹក', $formattedTime);
        $formattedTime = str_replace('PM', 'ល្ងាច', $formattedTime);

        return $formattedTime;
    }
}
