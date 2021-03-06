<?php
namespace Database\Seeders\Addresses;


use App\Models\Address\TimeZone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TimezonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $timezones=[

            [
                "value"=> "Dateline Standard Time",
                "abbr"=> "DST",
                "offset"=> -12,
                "dst"=> false,
                "text"=> "(UTC-12:00) International Date Line West",
                "utc"=> "Etc/GMT+12"
              ],
              [
                "value"=> "UTC-11",
                "abbr"=> "U",
                "offset"=> -11,
                "dst"=> false,
                "text"=> "(UTC-11:00) Coordinated Universal Time-11",
                "utc"=> "Pacific/Midway"
              ],
              [
                "value"=> "Hawaiian Standard Time",
                "abbr"=> "HST",
                "offset"=> -10,
                "dst"=> false,
                "text"=> "(UTC-10:00) Hawaii",
                "utc"=> "Pacific/Honolulu"
              ],
              [
                "value"=> "Alaskan Standard Time",
                "abbr"=> "AKDT",
                "offset"=> -8,
                "dst"=> true,
                "text"=> "(UTC-09:00) Alaska",
                "utc"=> "America/Anchorage"
              ],
              [
                "value"=> "Pacific Standard Time (Mexico)",
                "abbr"=> "PDT",
                "offset"=> -7,
                "dst"=> true,
                "text"=> "(UTC-08:00) Baja California",
                "utc"=> "America/Santa_Isabel"
              ],
              [
                "value"=> "Pacific Standard Time",
                "abbr"=> "PDT",
                "offset"=> -7,
                "dst"=> true,
                "text"=> "(UTC-08:00) Pacific Time (US & Canada)",
                "utc"=> "America/Los_Angeles"
              ],
              [
                "value"=> "US Mountain Standard Time",
                "abbr"=> "UMST",
                "offset"=> -7,
                "dst"=> false,
                "text"=> "(UTC-07:00) Arizona",
                "utc"=> "America/Phoenix"
              ],
              [
                "value"=> "Mountain Standard Time (Mexico)",
                "abbr"=> "MDT",
                "offset"=> -6,
                "dst"=> true,
                "text"=> "(UTC-07:00) Chihuahua, La Paz, Mazatlan",
                "utc"=> "America/Chihuahua"
              ],
              [
                "value"=> "Mountain Standard Time",
                "abbr"=> "MDT",
                "offset"=> -6,
                "dst"=> true,
                "text"=> "(UTC-07:00) Mountain Time (US & Canada)",
                "utc"=> "America/Denver"
              ],
              [
                "value"=> "Central America Standard Time",
                "abbr"=> "CAST",
                "offset"=> -6,
                "dst"=> false,
                "text"=> "(UTC-06:00) Central America",
                "utc"=> "America/Guatemala"
              ],
              [
                "value"=> "Central Standard Time",
                "abbr"=> "CDT",
                "offset"=> -5,
                "dst"=> true,
                "text"=> "(UTC-06:00) Central Time (US & Canada)",
                "utc"=> "America/Chicago"
              ],
              [
                "value"=> "Central Standard Time (Mexico)",
                "abbr"=> "CDT",
                "offset"=> -5,
                "dst"=> true,
                "text"=> "(UTC-06:00) Guadalajara, Mexico City, Monterrey",
                "utc"=> "America/Mexico_City"
              ],
              [
                "value"=> "Canada Central Standard Time",
                "abbr"=> "CCST",
                "offset"=> -6,
                "dst"=> false,
                "text"=> "(UTC-06:00) Saskatchewan",
                "utc"=> "America/Regina"
              ],
              [
                "value"=> "SA Pacific Standard Time",
                "abbr"=> "SPST",
                "offset"=> -5,
                "dst"=> false,
                "text"=> "(UTC-05:00) Bogota, Lima, Quito",
                "utc"=> "America/Lima"
              ],
              [
                "value"=> "Eastern Standard Time",
                "abbr"=> "EDT",
                "offset"=> -4,
                "dst"=> true,
                "text"=> "(UTC-05:00) Eastern Time (US & Canada)",
                "utc"=> "America/New_York"
              ],
              [
                "value"=> "US Eastern Standard Time",
                "abbr"=> "UEDT",
                "offset"=> -4,
                "dst"=> true,
                "text"=> "(UTC-05:00) Indiana (East)",
                "utc"=> "America/Indianapolis"
              ],
              [
                "value"=> "Venezuela Standard Time",
                "abbr"=> "VST",
                "offset"=> -4.5,
                "dst"=> false,
                "text"=> "(UTC-04:30) Caracas",
                "utc"=> "America/Caracas"
              ],
              [
                "value"=> "Paraguay Standard Time",
                "abbr"=> "PST",
                "offset"=> -4,
                "dst"=> false,
                "text"=> "(UTC-04:00) Asuncion",
                "utc"=> "America/Asuncion"
              ],
              [
                "value"=> "Atlantic Standard Time",
                "abbr"=> "ADT",
                "offset"=> -3,
                "dst"=> true,
                "text"=> "(UTC-04:00) Atlantic Time (Canada)",
                "utc"=> "Atlantic/Bermuda"
              ],
              [
                "value"=> "Central Brazilian Standard Time",
                "abbr"=> "CBST",
                "offset"=> -4,
                "dst"=> false,
                "text"=> "(UTC-04:00) Cuiaba",
                "utc"=> "America/Cuiaba"
              ],
              [
                "value"=> "SA Western Standard Time",
                "abbr"=> "SWST",
                "offset"=> -4,
                "dst"=> false,
                "text"=> "(UTC-04:00) Georgetown, La Paz, Manaus, San Juan",
                "utc"=> "America/Aruba"
              ],
              [
                "value"=> "Pacific SA Standard Time",
                "abbr"=> "PSST",
                "offset"=> -4,
                "dst"=> false,
                "text"=> "(UTC-04:00) Santiago",
                "utc"=> "America/Santiago"
              ],
              [
                "value"=> "Newfoundland Standard Time",
                "abbr"=> "NDT",
                "offset"=> -2.5,
                "dst"=> true,
                "text"=> "(UTC-03:30) Newfoundland",
                "utc"=> "America/St_Johns"
              ],
              [
                "value"=> "E. South America Standard Time",
                "abbr"=> "ESAST",
                "offset"=> -3,
                "dst"=> false,
                "text"=> "(UTC-03:00) Brasilia",
                "utc"=> "America/Sao_Paulo"
              ],
              [
                "value"=> "Argentina Standard Time",
                "abbr"=> "AST",
                "offset"=> -3,
                "dst"=> false,
                "text"=> "(UTC-03:00) Buenos Aires",
                "utc"=> "America/Buenos_Aires"
              ],
              [
                "value"=> "SA Eastern Standard Time",
                "abbr"=> "SEST",
                "offset"=> -3,
                "dst"=> false,
                "text"=> "(UTC-03:00) Cayenne, Fortaleza",
                "utc"=> "America/Cayenne"
              ],
              [
                "value"=> "Greenland Standard Time",
                "abbr"=> "GDT",
                "offset"=> -2,
                "dst"=> true,
                "text"=> "(UTC-03:00) Greenland",
                "utc"=> "America/Godthab"
              ],
              [
                "value"=> "Montevideo Standard Time",
                "abbr"=> "MST",
                "offset"=> -3,
                "dst"=> false,
                "text"=> "(UTC-03:00) Montevideo",
                "utc"=> "America/Montevideo"
              ],
              [
                "value"=> "Bahia Standard Time",
                "abbr"=> "BST",
                "offset"=> -3,
                "dst"=> false,
                "text"=> "(UTC-03:00) Salvador",
                "utc"=> "America/Bahia"
              ],
              [
                "value"=> "UTC-02",
                "abbr"=> "U",
                "offset"=> -2,
                "dst"=> false,
                "text"=> "(UTC-02:00) Coordinated Universal Time-02",
                "utc"=> "America/Noronha"
              ],
              [
                "value"=> "Azores Standard Time",
                "abbr"=> "ADT",
                "offset"=> 0,
                "dst"=> true,
                "text"=> "(UTC-01:00) Azores",
                "utc"=> "Atlantic/Azores"
              ],
              [
                "value"=> "Cape Verde Standard Time",
                "abbr"=> "CVST",
                "offset"=> -1,
                "dst"=> false,
                "text"=> "(UTC-01:00) Cape Verde Is.",
                "utc"=> "Atlantic/Cape_Verde"
              ],
              [
                "value"=> "Morocco Standard Time",
                "abbr"=> "MDT",
                "offset"=> 1,
                "dst"=> true,
                "text"=> "(UTC) Casablanca",
                "utc"=> "Africa/Casablanca"
              ],
              [
                "value"=> "UTC",
                "abbr"=> "CUT",
                "offset"=> 0,
                "dst"=> false,
                "text"=> "(UTC) Coordinated Universal Time",
                "utc"=> "America/Danmarkshavn"
              ],
              [
                "value"=> "GMT Standard Time",
                "abbr"=> "GDT",
                "offset"=> 1,
                "dst"=> true,
                "text"=> "(UTC) Dublin, Edinburgh, Lisbon, London",
                "utc"=> "Europe/London"
              ],
              [
                "value"=> "Greenwich Standard Time",
                "abbr"=> "GST",
                "offset"=> 0,
                "dst"=> false,
                "text"=> "(UTC) Monrovia, Reykjavik",
                "utc"=> "Africa/Monrovia"
              ],
              [
                "value"=> "W. Europe Standard Time",
                "abbr"=> "WEDT",
                "offset"=> 2,
                "dst"=> true,
                "text"=> "(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna",
                "utc"=> "Europe/Amsterdam"
              ],
              [
                "value"=> "Central Europe Standard Time",
                "abbr"=> "CEDT",
                "offset"=> 2,
                "dst"=> true,
                "text"=> "(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague",
                "utc"=> "Europe/Budapest"
              ],
              [
                "value"=> "Romance Standard Time",
                "abbr"=> "RDT",
                "offset"=> 2,
                "dst"=> true,
                "text"=> "(UTC+01:00) Brussels, Copenhagen, Madrid, Paris",
                "utc"=> "Europe/Paris"
              ],
              [
                "value"=> "Central European Standard Time",
                "abbr"=> "CEDT",
                "offset"=> 2,
                "dst"=> true,
                "text"=> "(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb",
                "utc"=> "Europe/Warsaw"
              ],
              [
                "value"=> "W. Central Africa Standard Time",
                "abbr"=> "WCAST",
                "offset"=> 1,
                "dst"=> false,
                "text"=> "(UTC+01:00) West Central Africa",
                "utc"=> "Africa/Lagos"
              ],
              [
                "value"=> "Namibia Standard Time",
                "abbr"=> "NST",
                "offset"=> 1,
                "dst"=> false,
                "text"=> "(UTC+01:00) Windhoek",
                "utc"=> "Africa/Windhoek"
              ],
              [
                "value"=> "GTB Standard Time",
                "abbr"=> "GDT",
                "offset"=> 3,
                "dst"=> true,
                "text"=> "(UTC+02:00) Athens, Bucharest, Chisinau, Nicosia",
                "utc"=> "Europe/Athens"
              ],
              [
                "value"=> "Middle East Standard Time",
                "abbr"=> "MEDT",
                "offset"=> 3,
                "dst"=> true,
                "text"=> "(UTC+02:00) Beirut",
                "utc"=> "Asia/Beirut"
              ],
              [
                "value"=> "Egypt Standard Time",
                "abbr"=> "EST",
                "offset"=> 2,
                "dst"=> false,
                "text"=> "(UTC+02:00) Cairo",
                "utc"=> "Africa/Cairo"
              ],
              [
                "value"=> "Syria Standard Time",
                "abbr"=> "SDT",
                "offset"=> 3,
                "dst"=> true,
                "text"=> "(UTC+02:00) Damascus",
                "utc"=> "Asia/Damascus"
              ],
              [
                "value"=> "South Africa Standard Time",
                "abbr"=> "SAST",
                "offset"=> 2,
                "dst"=> false,
                "text"=> "(UTC+02:00) Harare, Pretoria, Johannesburg, Bujumbura",
                "utc"=> "Africa/Harare"
              ],
              [
                "value"=> "FLE Standard Time",
                "abbr"=> "FDT",
                "offset"=> 3,
                "dst"=> true,
                "text"=> "(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius",
                "utc"=> "Europe/Helsinki"
              ],
              [
                "value"=> "Turkey Standard Time",
                "abbr"=> "TDT",
                "offset"=> 3,
                "dst"=> true,
                "text"=> "(UTC+02:00) Istanbul",
                "utc"=> "Europe/Istanbul"
              ],
              [
                "value"=> "Israel Standard Time",
                "abbr"=> "JDT",
                "offset"=> 3,
                "dst"=> true,
                "text"=> "(UTC+02:00) Jerusalem",
                "utc"=> "Asia/Jerusalem"
              ],
              [
                "value"=> "Libya Standard Time",
                "abbr"=> "LST",
                "offset"=> 2,
                "dst"=> false,
                "text"=> "(UTC+02:00) Tripoli",
                "utc"=> "Africa/Tripoli"
              ],
              [
                "value"=> "Jordan Standard Time",
                "abbr"=> "JST",
                "offset"=> 3,
                "dst"=> false,
                "text"=> "(UTC+03:00) Amman",
                "utc"=> "Asia/Amman"
              ],
              [
                "value"=> "Arabic Standard Time",
                "abbr"=> "AST",
                "offset"=> 3,
                "dst"=> false,
                "text"=> "(UTC+03:00) Baghdad",
                "utc"=> "Asia/Baghdad"
              ],
              [
                "value"=> "Kaliningrad Standard Time",
                "abbr"=> "KST",
                "offset"=> 3,
                "dst"=> false,
                "text"=> "(UTC+03:00) Kaliningrad, Minsk",
                "utc"=> "Europe/Kaliningrad"
              ],
              [
                "value"=> "Arab Standard Time",
                "abbr"=> "AST",
                "offset"=> 3,
                "dst"=> false,
                "text"=> "(UTC+03:00) Aden, Bahrain, Kuwait, Riyadh, Qatar",
                "utc"=> "Asia/Qatar"
              ],
              [
                "value"=> "E. Africa Standard Time",
                "abbr"=> "EAST",
                "offset"=> 3,
                "dst"=> false,
                "text"=> "(UTC+03:00) Nairobi, Comoro, Juba",
                "utc"=> "Africa/Nairobi"
              ],
              [
                "value"=> "Iran Standard Time",
                "abbr"=> "IDT",
                "offset"=> 4.5,
                "dst"=> true,
                "text"=> "(UTC+03:30) Tehran",
                "utc"=> "Asia/Tehran"
              ],
              [
                "value"=> "Arabian Standard Time",
                "abbr"=> "AST",
                "offset"=> 4,
                "dst"=> false,
                "text"=> "(UTC+04:00) Abu Dhabi, Muscat",
                "utc"=> "Asia/Dubai"
              ],
              [
                "value"=> "Azerbaijan Standard Time",
                "abbr"=> "ADT",
                "offset"=> 5,
                "dst"=> true,
                "text"=> "(UTC+04:00) Baku",
                "utc"=> "Asia/Baku"
              ],
              [
                "value"=> "Russian Standard Time",
                "abbr"=> "RST",
                "offset"=> 4,
                "dst"=> false,
                "text"=> "(UTC+04:00) Samara, Moscow, St. Petersburg, Simferopol, Volgograd",
                "utc"=> "Europe/Moscow"
              ],
              [
                "value"=> "Mauritius Standard Time",
                "abbr"=> "MST",
                "offset"=> 4,
                "dst"=> false,
                "text"=> "(UTC+04:00) Port Louis, Mauritius, Reunion, Mahe",
                "utc"=> "Indian/Mauritius"
              ],
              [
                "value"=> "Georgian Standard Time",
                "abbr"=> "GST",
                "offset"=> 4,
                "dst"=> false,
                "text"=> "(UTC+04:00) Tbilisi",
                "utc"=> "Asia/Tbilisi"
              ],
              [
                "value"=> "Caucasus Standard Time",
                "abbr"=> "CST",
                "offset"=> 4,
                "dst"=> false,
                "text"=> "(UTC+04:00) Yerevan",
                "utc"=> "Asia/Yerevan"
              ],
              [
                "value"=> "Afghanistan Standard Time",
                "abbr"=> "AST",
                "offset"=> 4.5,
                "dst"=> false,
                "text"=> "(UTC+04:30) Kabul",
                "utc"=> "Asia/Kabul"
              ],
              [
                "value"=> "West Asia Standard Time",
                "abbr"=> "WAST",
                "offset"=> 5,
                "dst"=> false,
                "text"=> "(UTC+05:00) Ashgabat, Dushanbe, Tashkent, Maldives",
                "utc"=> "Asia/Tashkent"
              ],
              [
                "value"=> "Pakistan Standard Time",
                "abbr"=> "PST",
                "offset"=> 5,
                "dst"=> false,
                "text"=> "(UTC+05:00) Islamabad, Karachi",
                "utc"=> "Asia/Karachi"
              ],
              [
                "value"=> "India Standard Time",
                "abbr"=> "IST",
                "offset"=> 5.5,
                "dst"=> false,
                "text"=> "(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi",
                "utc"=> "Asia/Calcutta"
              ],
              [
                "value"=> "Sri Lanka Standard Time",
                "abbr"=> "SLST",
                "offset"=> 5.5,
                "dst"=> false,
                "text"=> "(UTC+05:30) Sri Jayawardenepura",
                "utc"=> "Asia/Colombo"
              ],
              [
                "value"=> "Nepal Standard Time",
                "abbr"=> "NST",
                "offset"=> 5.75,
                "dst"=> false,
                "text"=> "(UTC+05=>45) Kathmandu",
                "utc"=> "Asia/Katmandu"
              ],
              [
                "value"=> "Central Asia Standard Time",
                "abbr"=> "CAST",
                "offset"=> 6,
                "dst"=> false,
                "text"=> "(UTC+06:00) Astana, Dhaka, Thimphu",
                "utc"=> "Asia/Dhaka"
              ],
              [
                "value"=> "Ekaterinburg Standard Time",
                "abbr"=> "EST",
                "offset"=> 6,
                "dst"=> false,
                "text"=> "(UTC+06:00) Ekaterinburg",
                "utc"=> "Asia/Yekaterinburg"
              ],
              [
                "value"=> "Myanmar Standard Time",
                "abbr"=> "MST",
                "offset"=> 6.5,
                "dst"=> false,
                "text"=> "(UTC+06:30) Yangon (Rangoon), Cocos",
                "utc"=> "Asia/Rangoon"
              ],
              [
                "value"=> "SE Asia Standard Time",
                "abbr"=> "SAST",
                "offset"=> 7,
                "dst"=> false,
                "text"=> "(UTC+07:00) Bangkok, Hanoi, Jakarta, Saigon",
                "utc"=> "Asia/Bangkok"
              ],
              [
                "value"=> "N. Central Asia Standard Time",
                "abbr"=> "NCAST",
                "offset"=> 7,
                "dst"=> false,
                "text"=> "(UTC+07:00) Novosibirsk",
                "utc"=> "Asia/Novosibirsk"
              ],
              [
                "value"=> "China Standard Time",
                "abbr"=> "CST",
                "offset"=> 8,
                "dst"=> false,
                "text"=> "(UTC+08:00) Beijing, Chongqing, Hong Kong, Macau, Shanghai, Urumqi",
                "utc"=> "Asia/Shanghai"
              ],
              [
                "value"=> "North Asia Standard Time",
                "abbr"=> "NAST",
                "offset"=> 8,
                "dst"=> false,
                "text"=> "(UTC+08:00) Krasnoyarsk",
                "utc"=> "Asia/Krasnoyarsk"
              ],
              [
                "value"=> "Singapore Standard Time",
                "abbr"=> "MPST",
                "offset"=> 8,
                "dst"=> false,
                "text"=> "(UTC+08:00) Kuala Lumpur, Singapore, Brunei, Makassar, Manila",
                "utc"=> "Asia/Singapore"
              ],
              [
                "value"=> "W. Australia Standard Time",
                "abbr"=> "WAST",
                "offset"=> 8,
                "dst"=> false,
                "text"=> "(UTC+08:00) Perth",
                "utc"=> "Australia/Perth"
              ],
              [
                "value"=> "Taipei Standard Time",
                "abbr"=> "TST",
                "offset"=> 8,
                "dst"=> false,
                "text"=> "(UTC+08:00) Taipei",
                "utc"=> "Asia/Taipei"
              ],
              [
                "value"=> "Ulaanbaatar Standard Time",
                "abbr"=> "UST",
                "offset"=> 8,
                "dst"=> false,
                "text"=> "(UTC+08:00) Ulaanbaatar",
                "utc"=> "Asia/Ulaanbaatar"
              ],
              [
                "value"=> "North Asia East Standard Time",
                "abbr"=> "NAEST",
                "offset"=> 9,
                "dst"=> false,
                "text"=> "(UTC+09:00) Irkutsk",
                "utc"=> "Asia/Irkutsk"
              ],
              [
                "value"=> "Tokyo Standard Time",
                "abbr"=> "TST",
                "offset"=> 9,
                "dst"=> false,
                "text"=> "(UTC+09:00) Dili, Osaka, Palau, Sapporo, Tokyo",
                "utc"=> "Asia/Tokyo"
              ],
              [
                "value"=> "Korea Standard Time",
                "abbr"=> "KST",
                "offset"=> 9,
                "dst"=> false,
                "text"=> "(UTC+09:00) Pyongyang, Seoul",
                "utc"=> "Asia/Seoul"
              ],
              [
                "value"=> "Cen. Australia Standard Time",
                "abbr"=> "CAST",
                "offset"=> 9.5,
                "dst"=> false,
                "text"=> "(UTC+09:30) Adelaide",
                "utc"=> "Australia/Adelaide"
              ],
              [
                "value"=> "AUS Central Standard Time",
                "abbr"=> "ACST",
                "offset"=> 9.5,
                "dst"=> false,
                "text"=> "(UTC+09:30) Darwin",
                "utc"=> "Australia/Darwin"
              ],
              [
                "value"=> "E. Australia Standard Time",
                "abbr"=> "EAST",
                "offset"=> 10,
                "dst"=> false,
                "text"=> "(UTC+10:00) Brisbane",
                "utc"=> "Australia/Brisbane"
              ],
              [
                "value"=> "AUS Eastern Standard Time",
                "abbr"=> "AEST",
                "offset"=> 10,
                "dst"=> false,
                "text"=> "(UTC+10:00) Canberra, Melbourne, Sydney",
                "utc"=> "Australia/Sydney"
              ],
              [
                "value"=> "West Pacific Standard Time",
                "abbr"=> "WPST",
                "offset"=> 10,
                "dst"=> false,
                "text"=> "(UTC+10:00) Guam, Port Moresby",
                "utc"=> "Pacific/Guam"
              ],
              [
                "value"=> "Tasmania Standard Time",
                "abbr"=> "TST",
                "offset"=> 10,
                "dst"=> false,
                "text"=> "(UTC+10:00) Hobart",
                "utc"=> "Australia/Hobart"
              ],
              [
                "value"=> "Yakutsk Standard Time",
                "abbr"=> "YST",
                "offset"=> 10,
                "dst"=> false,
                "text"=> "(UTC+10:00) Yakutsk",
                "utc"=> "Asia/Yakutsk"
              ],
              [
                "value"=> "Central Pacific Standard Time",
                "abbr"=> "CPST",
                "offset"=> 11,
                "dst"=> false,
                "text"=> "(UTC+11:00) Solomon Is., New Caledonia",
                "utc"=> "Pacific/Guadalcanal"
              ],
              [
                "value"=> "Vladivostok Standard Time",
                "abbr"=> "VST",
                "offset"=> 11,
                "dst"=> false,
                "text"=> "(UTC+11:00) Vladivostok",
                "utc"=> "Asia/Vladivostok"
              ],
              [
                "value"=> "New Zealand Standard Time",
                "abbr"=> "NZST",
                "offset"=> 12,
                "dst"=> false,
                "text"=> "(UTC+12:00) Auckland, Wellington",
                "utc"=> "Antarctica/McMurdo"
              ],
              [
                "value"=> "UTC+12",
                "abbr"=> "U",
                "offset"=> 12,
                "dst"=> false,
                "text"=> "(UTC+12:00) Coordinated Universal Time+12",
                "utc"=> "Pacific/Tarawa"
              ],
              [
                "value"=> "Fiji Standard Time",
                "abbr"=> "FST",
                "offset"=> 12,
                "dst"=> false,
                "text"=> "(UTC+12:00) Fiji",
                "utc"=> "Pacific/Fiji"
              ],
              [
                "value"=> "Magadan Standard Time",
                "abbr"=> "MST",
                "offset"=> 12,
                "dst"=> false,
                "text"=> "(UTC+12:00) Magadan",
                "utc"=> "Asia/Magadan"
              ],
              [
                "value"=> "Samoa/Tonga/Kamchatka Standard Time",
                "abbr"=> "SST",
                "offset"=> 13,
                "dst"=> false,
                "text"=> "(UTC+13:00) Samoa, Tongatapu, Fakaofo, Enderbury",
                "utc"=> "Pacific/Apia"
              ]


              ];
              foreach($timezones as $timezone)
              {
                TimeZone::insert([
                     'value'             => $timezone['value'] ? $timezone['value'] :Null,
                     'abbr'              => $timezone['abbr'] ? $timezone['abbr'] :Null,
                     'offset'            => $timezone['offset'] ? $timezone['offset'] :Null,
                     'text'              => $timezone['text'] ? $timezone['text'] :Null,
                     'utc'               => $timezone['utc'] ? $timezone['utc'] :Null,
                     'dst'               => $timezone['dst'] ? $timezone['dst'] :Null,
                     'created_at'        => Carbon::Now(),
                     'updated_at'        => Carbon::Now(),
                 ]);
              }

    }
}
