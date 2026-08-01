<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>{{ $title }}</h2>
    <p>A new form has been submitted on your website. Here are the details:</p>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        @foreach($data as $key => $value)
            @if(is_array($value) || is_object($value))
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold; width: 30%;">{{ ucwords(str_replace('_', ' ', $key)) }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <pre style="margin: 0; font-family: inherit;">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                    </td>
                </tr>
            @else
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold; width: 30%;">{{ ucwords(str_replace('_', ' ', $key)) }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $value }}</td>
                </tr>
            @endif
        @endforeach
    </table>

    <p style="margin-top: 20px; font-size: 0.9em; color: #777;">
        This is an automated notification from your website.
    </p>
</body>
</html>
