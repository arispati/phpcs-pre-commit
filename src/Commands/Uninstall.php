<?php

namespace Arispati\PhpcsPreCommit\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class Uninstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'arispati:phpcs-uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uninstall phpcs and git pre commit hook';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // write message
        $this->line('Arispati: uninstalling git hook script');
        if (Config::get('app.env') != 'production') {
            if (File::exists(App::basePath('.git/hooks/pre-commit'))) {
                // deleting file
                File::delete(App::basePath('.git/hooks/pre-commit'));
                // write message
                $this->line('Arispati: git hook script deleted');
            } else {
                // write message
                $this->line('Arispati: script file not found, command aborted');
            }
        } else {
            // write message
            $this->line('Arispati: current environment is production, command aborted!');
        }
    }
}
