<!doctype HTML>
<html>
    <body>
        <h3>Your check</h3>
        <table>
                <tr>
                    <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                    <td>{{ $invoice->total() }}</td>
                    <td><a href="{{$invoice->invoice_pdf}}">Download</a></td>
                </tr>
        </table>
    </body>
</html>

