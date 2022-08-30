<?php

namespace Modules\VideoService\Database\Migrations;

use Modules\Migration as MigrationInterface;

class StructMigration implements MigrationInterface
{
    private const MIGRATIONS = [
        'CreateFormatsTable' => 'create_formats_table.php.stub',
        'CreateGenreVideoTable' => 'create_genre_video_table.php.stub',
        'CreateGenresTable' => 'create_genres_table.php.stub',
        'CreatePersonVideoTable' => 'create_person_video_table.php.stub',
        'CreatePersonsTable' => 'create_persons_table.php.stub',
        'CreatePositionsTable' => 'create_positions_table.php.stub',
        'CreateSourcesTable' => 'create_sources_table.php.stub',
        'CreateTranslationsTable' => 'create_translations_table.php.stub',
        'CreateVideosTable' => 'create_videos_table.php.stub',
    ];

    public static function getMigrations(): array
    {
        return self::MIGRATIONS;
    }
}
