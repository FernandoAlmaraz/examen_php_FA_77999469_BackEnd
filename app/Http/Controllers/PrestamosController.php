<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use Illuminate\Http\Request;
use App\Filters\PrestamoFilter;
use App\Http\Requests\StorePrestamoRequest;
use App\Http\Requests\UpdatePrestamoRequest;
use App\Http\Resources\PrestamoCollection;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller
{
    public function index(Request $request)
    {
        $filter = new PrestamoFilter();
        $queryItems = $filter->transform($request);
        $loans = Prestamos::where($queryItems);
        return new PrestamoCollection($loans->paginate()->appends($request->query()));
    }
    public function store(StorePrestamoRequest $request)
    {
        return Prestamos::create($request->all());
    }
    public function show(Prestamos $loan)
    {
        return response()->json([
            'status' => true,
            'data' => $loan
        ]);
    }
    public function update(UpdatePrestamoRequest $request, Prestamos $loan)
    {
        $loan->update($request->all());
    }
    public function destroy(Prestamos $loan)
    {
        $loan->delete();
        return response()->json([
            'status' => true,
            'message' => 'Loan deleted successfully'
        ]);
    }
    public function overdueLoans()
    {
        $loans =
            DB::table('prestamos')
            ->select(
                'libros.title AS title',
                'prestamos.status',
                'prestamos.id AS id',
                'clientes.name AS name',
                'clientes.cellphone',
                DB::raw('DATE_ADD(prestamos.loan_date, INTERVAL prestamos.loan_days DAY) AS due_date'),
                DB::raw('CASE WHEN DATE_ADD(prestamos.loan_date, INTERVAL prestamos.loan_days DAY) < CURDATE() THEN "Vencido" ELSE "No vencido" END AS status_due')
            )
            ->join('libros', 'prestamos.book_id', '=', 'libros.id')
            ->join('clientes', 'prestamos.client_id', '=', 'clientes.id')
            ->where('prestamos.status', '=', 'En Prestamo')
            ->get();
        return
            response()->json($loans);
    }
    public function  weeklyReport()
    {
        $reportWeekly = DB::table('prestamos')
            ->select(
                DB::raw('YEAR(loan_date) AS año'),
                DB::raw('MONTH(loan_date) AS mes'),
                DB::raw('FLOOR((DAY(loan_date) - 1) / 7) + 1 AS semana'),
                DB::raw('COUNT(*) AS total_prestamos')
            )
            ->groupBy('año', 'mes', 'semana')
            ->get();

        return response()->json($reportWeekly);
    }
    public function monthlyReport()
    {
        $reportMonthly = DB::table('prestamos')
            ->select(
                DB::raw('YEAR(loan_date) AS año'),
                DB::raw('MONTH(loan_date) AS mes'),
                DB::raw('COUNT(*) AS total_prestamos')
            )
            ->groupBy('año', 'mes')
            ->get();

        return response()->json($reportMonthly);
    }
}
