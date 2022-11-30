@extends('layout.layout')

@section('content')
    Spenden:<br>
    Wir weisen darauf hin, dass das DET, die Programmierer und Betreuer, sowie diejenigen, die die Texte schreiben, völlig unentgeltlich arbeiten.<br>
    Die Ewigen kosten jedoch bereits alleine dafür Geld, dass das Spiel auf Servern läuft, die angemietet sind und bezahlt werden müssen. Weitere kosten fallen für die Domäne an.<br><br>
    Früher konnte man käuflich Credits erwerben, mittels derer man sich geringe Vorteile im Spiel erkaufen konnte. <br>
    Da dies der Philosophie des Spieles aber zuwiderlief, wurden die Kauf-Credits wieder abgeschafft. <br>
    Credits werden nur noch als Bonus für Anwesenheit verschenkt. <br><br>
    Dafür sind Die Ewigen aber nun auf Spenden angewiesen, die – und das betonen wir – nur freiwillig gegeben werden sollen, <br>
    keinem Zwang unterliegen und die auch keinerlei Vorteil im Spiel bringen (außer dem guten Gewissen, dass man etwas zum Erhalt des Spieles beigetragen hat).<br><br>
    Daher wäre es sehr nett von euch, wenn ihr eine geringe Summe spenden könntet. <br><br>
    Wir garantieren, dass euer Geld ausschließlich für die Erhaltung des Spiels verwendet wird.<br>
    <br>
    PayPal Adresse: dieerben@gmail.com<br>
    <br>
    Bankverbindung: ?<br>
    <br>
    <div id="donate-button-container">
        <div id="donate-button"></div>
        <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
        <script>
            PayPal.Donation.Button({
                env:'production',
                hosted_button_id:'3VYH26J222RHE',
                image: {
                    src:'https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif',
                    alt:'Spenden mit dem PayPal-Button',
                    title:'PayPal - The safer, easier way to pay online!',
                }
            }).render('#donate-button');
        </script>
    </div>
@endsection
