<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\User;
use App\Hash;
use View;
use Storage;

class CreateXmlReport extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'xml:report';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$users = User::all();
		foreach ($users as $user)
		{
			$hashes = Hash::where('user_id', '=', $user->id)->get();
			$view = View::make('xml.report', ['hashes' => $hashes, 'user' => $user]);
			$contents = $view->render();
			$date = date('Y-m-d_H-i-s');
			Storage::disk('local')->put("user{$user->id}_{$date}.xml", $contents);
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['example', InputArgument::OPTIONAL, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
