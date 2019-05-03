<?php namespace Arcanedev\LogViewer\Http\Controllers;

use Arcanedev\LogViewer\Contracts\LogViewer as LogViewerContract;
use Arcanedev\LogViewer\Entities\LogEntry;
use Arcanedev\LogViewer\Exceptions\LogNotFoundException;
use Arcanedev\LogViewer\Tables\StatsTable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Class     LogViewerController
 *
 * @package  LogViewer\Http\Controllers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LogViewerController extends Controller
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The log viewer instance
     *
     * @var \Arcanedev\LogViewer\Contracts\LogViewer
     */
    protected $logViewer;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
    protected $showRoute = 'log-viewer::logs.show';

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * LogViewerController constructor.
     *
     * @param  \Arcanedev\LogViewer\Contracts\LogViewer  $logViewer
     */
    public function __construct(LogViewerContract $logViewer)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $this->logViewer = $logViewer;
                $this->perPage = config('log-viewer.per-page', $this->perPage);

            }
        }else{
            return redirect('/login');
        }
        
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $stats     = $this->logViewer->statsTable();
                $chartData = $this->prepareChartData($stats);
                $percents  = $this->calcPercentages($stats->footer(), $stats->header());
                return $this->view('dashboard', compact('chartData', 'percents'));
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * List all logs.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function listLogs(Request $request)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $stats   = $this->logViewer->statsTable();
                $headers = $stats->header();
                $rows    = $this->paginate($stats->rows(), $request);
        
                return $this->view('logs', compact('headers', 'rows'));
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }

    }

    /**
     * Show the log.
     *
     * @param  string                    $date
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function show($date, Request $request)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $level   = 'all';
                $log     = $this->getLogOrFail($date);
                $query   = $request->get('query');
                $levels  = $this->logViewer->levelsNames();
                $entries = $log->entries($level)->paginate($this->perPage);
                return $this->view('show', compact('level', 'log', 'query', 'levels', 'entries'));
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Filter the log entries by level.
     *
     * @param  string                    $date
     * @param  string                    $level
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showByLevel($date, $level, Request $request)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                if ($level === 'all')
                    return redirect()->route($this->showRoute, [$date]);

                $log     = $this->getLogOrFail($date);
                $query   = $request->get('query');
                $levels  = $this->logViewer->levelsNames();
                $entries = $this->logViewer->entries($date, $level)->paginate($this->perPage);
                return $this->view('show', compact('level', 'log', 'query', 'levels', 'entries'));
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Show the log with the search query.
     *
     * @param  string                    $date
     * @param  string                    $level
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function search($date, $level = 'all', Request $request)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $query   = $request->get('query');

                if (is_null($query))
                    return redirect()->route($this->showRoute, [$date]);
        
                $log     = $this->getLogOrFail($date);
                $levels  = $this->logViewer->levelsNames();
                $entries = $log->entries($level)->filter(function (LogEntry $value) use ($query) {
                    return Str::contains($value->header, $query);
                })->paginate($this->perPage);
                return $this->view('show', compact('level', 'log', 'query', 'levels', 'entries'));
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Download the log
     *
     * @param  string  $date
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($date)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){
                return $this->logViewer->download($date);
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Delete a log.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                if ( ! $request->ajax())
                    abort(405, 'Method Not Allowed');

                $date = $request->get('date');
                return response()->json([
                    'result' => $this->logViewer->delete($date) ? 'success' : 'error'
                ]);

            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
        
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
     * @param  array   $data
     * @param  array   $mergeData
     *
     * @return \Illuminate\View\View
     */
    protected function view($view, $data = [], $mergeData = [])
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                return view('log-viewer::'.$view, $data, $mergeData);

            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Paginate logs.
     *
     * @param  array                     $data
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    protected function paginate(array $data, Request $request)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $data = new Collection($data);
                $page = $request->get('page', 1);
                $path = $request->url();

                return new LengthAwarePaginator(
                    $data->forPage($page, $this->perPage),
                    $data->count(),
                    $this->perPage,
                    $page,
                    compact('path')
                );
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }

    }

    /**
     * Get a log or fail
     *
     * @param  string  $date
     *
     * @return \Arcanedev\LogViewer\Entities\Log|null
     */
    protected function getLogOrFail($date)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $log = null;

                try {
                    $log = $this->logViewer->get($date);
                }
                catch (LogNotFoundException $e) {
                    abort(404, $e->getMessage());
                }

                return $log;
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }

    }

    /**
     * Prepare chart data.
     *
     * @param  \Arcanedev\LogViewer\Tables\StatsTable  $stats
     *
     * @return string
     */
    protected function prepareChartData(StatsTable $stats)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){
                
                $totals = $stats->totals()->all();

                return json_encode([
                    'labels'   => Arr::pluck($totals, 'label'),
                    'datasets' => [
                        [
                            'data'                 => Arr::pluck($totals, 'value'),
                            'backgroundColor'      => Arr::pluck($totals, 'color'),
                            'hoverBackgroundColor' => Arr::pluck($totals, 'highlight'),
                        ],
                    ],
                ]);
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }

        
    }

    /**
     * Calculate the percentage.
     *
     * @param  array  $total
     * @param  array  $names
     *
     * @return array
     */
    protected function calcPercentages(array $total, array $names)
    {
        if(\Auth::User()){
            if(\Auth::User()->hasRole('superadministrator') || \Auth::User()->hasRole('administrator')){

                $percents = [];
                $all      = Arr::get($total, 'all');

                foreach ($total as $level => $count) {
                    $percents[$level] = [
                        'name'    => $names[$level],
                        'count'   => $count,
                        'percent' => $all ? round(($count / $all) * 100, 2) : 0,
                    ];
                }
                return $percents;

            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }

    }
}
