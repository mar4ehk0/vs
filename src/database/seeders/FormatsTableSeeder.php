<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formats')->truncate();

        $data = [
            [
                'name' => 'ogv',
                'type' => 'video/ogg; codecs="theora, vorbis"',
                'ffmpeg_command' => 'command for converting to ogv',
            ],
            [
                'name' => 'mp4',
                'type' => 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"',
                'ffmpeg_command' => 'command for converting to mp4',
            ],
            [
                'name' => 'webm',
                'type' => 'video/webm; codecs="vp8, vorbis"',
                'ffmpeg_command' => 'command for converting to webm',
            ],
        ];

        DB::table('formats')->insert($data);
    }
}
