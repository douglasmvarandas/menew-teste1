<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\ScheduleRequestUpdate;
use App\Models\Schedule;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ScheduleRepository;
use App\Repositories\Contracts\StateRepository;
use App\Services\Schedule\CreateSchedule\Contracts\CreateScheduleService;
use App\Services\Schedule\UpdateSchedule\Contracts\UpdateScheduleService;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = app(ScheduleRepository::class)->getSchedules();

        return view('schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = app(CategoryRepository::class)->getCategories();
        $states = app(StateRepository::class)->getStates();

        return view('schedule.create', compact('categories', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $scheduleService = app(CreateScheduleService::class);
        $user = Auth::user();
        try {
            $scheduleService->setData($request->all())
                ->setUser($user)
                ->handle();

            return redirect()->route('schedules.index')->with('success', 'Agendamento realizado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Houve um erro ao realizar o agendamento: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        return view('schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $categories = app(CategoryRepository::class)->getCategories();
        $states = app(StateRepository::class)->getStates();

        return view('schedule.edit', compact('categories', 'states', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequestUpdate $request, Schedule $schedule)
    {
        $scheduleService = app(UpdateScheduleService::class);
        try {
            $scheduleService->setData($request->all())
                ->setSchedule($schedule)
                ->handle();

            return redirect()->route('schedules.index')->with('success', 'Agendamento atualizado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Houve um erro ao realizar a atualização do agendamento: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {

        try {
            $schedule->delete();

            return redirect()->route('schedules.index')->with('success', 'Agendamento removido com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Houve um erro ao realizar ao remover o agendamento: ' . $th->getMessage());
        }
    }
}
