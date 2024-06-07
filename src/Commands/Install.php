<?php

namespace Arispati\PhpcsPreCommit\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'arispati:phpcs-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install phpcs and git pre commit hook';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // write message
        $this->line('Arispati: installing git hook');
        if (Config::get('app.env') != 'production') {
            // write message
            $this->line('Arispati: validating script file');
            if (File::exists(App::basePath('vendor/arispati/phpcs-pre-commit/src/Scripts/pre-commit'))) {
                // write message
                $this->line('Arispati: script file found');
                // copy file
                File::copy(
                    App::basePath('vendor/arispati/phpcs-pre-commit/src/Scripts/pre-commit'),
                    App::basePath('.git/hooks/pre-commit')
                );
                // chmod the file
                File::chmod(App::basePath('.git/hooks/pre-commit'), 0755);
                // write message
                $this->line('Arispati: script file installed');
            } else {
                // write message
                $this->line('Arispati: script file not found, installation aborted');
            }
        } else {
            // write message
            $this->line('Arispati: current environment is production, installation aborted!');
        }
    }
}
