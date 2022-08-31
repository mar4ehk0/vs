<?php

namespace Modules\Format\Database\Seeders;

use Illuminate\Database\Seeder;
use Infrastructure\Models\Format;

class FormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'ogv',
                'type' => 'video/ogg; codecs="theora, vorbis"',
                'ffmpeg_command' => 'command for converting to ogv',
            ],
            [
                'name' => 'mp4',
                'type' => 'video/mp4; codecs="avc, mp4"',
                'ffmpeg_command' => 'command for converting to mp4',
            ],
            [
                'name' => 'webm',
                'type' => 'video/webm; codecs="vp8, vorbis"',
                'ffmpeg_command' => 'command for converting to webm',
            ],
        ];

        Format::factory(count($data))->sequence(fn ($sequence) => $data[$sequence->index])->create();
    }
}
