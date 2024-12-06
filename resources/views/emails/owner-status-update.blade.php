<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Estado de Reserva</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="text-align: center; padding: 20px; background-color: #4a90e2; border-radius: 5px;">
            <h1 style="color: #ffffff; margin: 0;">Pago realizado de una reserva en tu parqueadero</h1>
        </div>
        
        <div style="padding: 20px; background-color: #f8f9fa; border-radius: 5px; margin-top: 20px;">
            <h2 style="color: #2c3e50; margin-top: 0;">Cambio de Estado en Reserva</h2>
            <p style="color: #666666;">Se ha realizado un pago para la reserva {{ $reservation->reservation_number }}  con los siguientes detalles:</p>
        </div>

        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px; margin-top: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td colspan="2" style="padding: 12px; border-bottom: 2px solid #4a90e2; color: #333333; font-weight: bold; text-align: center; background-color: #f8f9fa;">
                        Pago realizado
                    </td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666;">Número de Reserva:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #333333;">#{{ $reservation->reservation_number }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666;">Cliente:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #333333;">{{ $reservation->customer_name }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666;">Email del Cliente:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #333333;">{{ $reservation->customer_email }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666;">Fecha de Inicio:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #333333;">{{ date('d/m/Y', strtotime($reservation->start_date)) }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666;">Fecha de Fin:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #333333;">{{ date('d/m/Y', strtotime($reservation->end_date)) }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666;">Espacio de Parking:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #333333;">#{{ $reservation->id_parking_space }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666; font-weight: bold;">Total:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #28a745; font-weight: bold;">${{ number_format($reservation->total, 2) }}</td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 20px; padding: 20px; background-color: #f8f9fa; border-radius: 5px; text-align: center;">
            <a href="#" style="display: inline-block; padding: 10px 20px; background-color: #4a90e2; color: #ffffff; text-decoration: none; border-radius: 5px;">Ver Detalles en el Panel</a>
        </div>

        <div style="text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
            <p style="color: #999999; font-size: 12px;">Este es un email automático de notificación.</p>
        </div>
    </div>
</body>
</html>