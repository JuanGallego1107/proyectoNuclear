<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reserva Registrada</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="text-align: center; padding: 20px; background-color: #4a90e2;">
            <h1 style="color: #ffffff; margin: 0;">Nueva Reserva Registrada #{{ $reservation->reservation_number }} </h1>
        </div>
        
        <div style="padding: 20px; background-color: #f8f9fa; border-radius: 5px; margin-top: 20px;">
            <h2 style="color: #2c3e50; margin-top: 0;">Detalles de la Reserva</h2>
            <p style="color: #666666;">Se ha registrado una nueva reserva en tu parqueadero con los siguientes detalles:</p>
        </div>

        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px; margin-top: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666; width: 40%;">Cliente:</td>
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
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666;">Espacio Reservado:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #333333;">#{{ $reservation->id_parking_space }}</td>
                </tr>
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #666666; font-weight: bold;">Total:</td>
                    <td style="padding: 12px; border-bottom: 1px solid #dee2e6; color: #28a745; font-weight: bold;">${{ number_format($reservation->total, 2) }}</td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 20px; padding: 20px; background-color: #f8f9fa; border-radius: 5px;">
            <h3 style="color: #2c3e50; margin-top: 0;">Estado de la Reserva</h3>
            <p style="color: #666666;">La reserva se encuentra en estado: <strong>#{{ $reservation->id_reservation_state }}</strong></p>
        </div>

        <div style="text-align: center; margin-top: 30px; padding: 20px; background-color: #e9ecef; border-radius: 5px;">
            <p style="color: #666666; margin: 0;">Para gestionar esta reserva, ingresa a tu panel de administración.</p>
        </div>

        <div style="text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
            <p style="color: #999999; font-size: 12px;">Este es un email automático de notificación.</p>
        </div>
    </div>
</body>
</html>