<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function createPDF($id)
    {
        $products = Product::with('category')->findOrFail($id);
        $users = User::findOrFail($id);

        $pdf = new Fpdf('P', 'mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 0);
        $pdf->SetTitle('Ticket del Equipo');

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(55, 5, utf8_decode('Taller de Soporte'), 0, 1, 'C');

        // Equipo
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(18, 10, 'DATOS DEL EQUIPO ', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(18, 5, utf8_decode('Ticket:'), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(3, 5, $products->id, 0, 1, 'R');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(18, 5, utf8_decode('Categoria:'), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(13, 5, $products->category->name, 0, 1, 'R');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(18, 5, utf8_decode('Marca:'), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(7, 5, $products->brand, 0, 1, 'R');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(18, 5, utf8_decode('Equipo'), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(15, 5, $products->name, 0, 1, 'R');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(10, 5, 'FECHA');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(40, 5, $products->updated_at->setTimezone('America/Caracas'), 0, 1, 'R');

        for ($i = 0; $i < 37; $i++) {
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(2, 5, '-', 0, 0, '');
        }
        $pdf->Ln();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(50, 5, utf8_decode('Entregado por'), 0, 0, 'L', true);
        // $pdf->Cell(10, 5, 'Precio', 0, 0, 'L', true);
        $pdf->Cell(15, 5, 'Total', 0, 1, 'L', true);
        $pdf->SetTextColor(0, 0, 0);

        // Datos
        $pdf->Cell(49, 5, utf8_decode($users->name), 0, 0, 'L');
        $pdf->Cell(15, 5, '$' . number_format($products->cost, 2, '.', ','), 0, 1, 'L');

        $pdf->Output();
        exit; // Asegúrate de salir después de generar el PDF
    }
}
