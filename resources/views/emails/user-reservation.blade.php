<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <div style="text-align: center; padding: 20px;">
            <h1 style="color: #333333; margin: 0;">Confirmación de Reserva</h1>
        </div>
        
        <div style="padding: 20px; background-color: #f8f9fa; border-radius: 5px; margin-bottom: 20px;">
            <h2 style="color: blue; margin-top: 0;">¡Reserva # {{ $reservation->reservation_number }} Confirmada!</h2>
            <p style="color: #666666;">Estimado/a {{ $reservation->customer_name }},</p>
            <p style="color: #666666;">Su reserva ha sido confirmada exitosamente. A continuación, encontrará los detalles:</p>
        </div>

        <div style="background-color: #ffffff; padding: 20px; border: 1px solid #dee2e6; border-radius: 5px;">
            <h3 style="color: #333333; margin-top: 0;">Detalles de la Reserva</h3>
            
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #666666;">Fecha de Inicio:</td>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #333333;">{{ date('d/m/Y', strtotime($reservation->start_date)) }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #666666;">Fecha de Fin:</td>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #333333;">{{ date('d/m/Y', strtotime($reservation->end_date)) }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #666666;">Espacio de Parking:</td>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #333333;">#{{ $reservation->id_parking_space }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #666666;">Total:</td>
                    <td style="padding: 10px; border-bottom: 1px solid #dee2e6; color: #333333;">${{ number_format($reservation->total, 2) }}</td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 20px; padding: 20px; background-color: #f8f9fa; border-radius: 5px; text-align: center;">
            <p style="color: #666666; margin-bottom: 5px;">Si tiene alguna pregunta, no dude en contactarnos.</p>
            <p style="color: #666666; margin-top: 0;">¡Gracias por confiar en nosotros!</p>
        </div>

        <div style="text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #dee2e6;">
            <p style="color: #999999; font-size: 12px;">Este es un email automático, por favor no responda a este mensaje.</p>
        </div>
    </div>
</body>
</html>