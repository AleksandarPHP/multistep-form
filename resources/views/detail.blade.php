@include('partials/header')
<style>

</style>
<main class="main-margin" id="mainId">
    <nav class="floors-navigator">
        <div class="container">
            <div class="navigator-slider">
                @foreach ($floor as $item)
                    <div>
                        <a href="{{url('sprat/'.$item->id)}}" @if ($item->id == $apartmant->floor_id)
                            class="active"
                        @endif>{{$item->title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </nav>
    <div class="container-fluid d-flex justify-content-center">
        <div class="pdf-container">
            <canvas id="pdfCanvas"></canvas>
        </div>
    </div>

    <section class="gallery-navigator brdr">
        <div class="container">

            <div class="button-wrapper">
                <a href="{{ Helper::url('galerija') }}" class="button button_secondary" style="margin-right: 1rem">
                    {{__('Gallery')}}
                </a>
                <a href="" class="button button_primary" data-bs-toggle="modal" data-bs-target="#contactModal">
                    Kontakt
                </a>
                @if ($apartmant->pdf)
                    <a href="{{asset('storage/'.$apartmant->pdf)}}" class="button button_secondary" style="margin-left: 1rem" download>
                        {{__('DOWNLOAD')}}
                    </a>
                @endif
        </div>
    </section>
    <p class="txt" style="text-align: center">
        Sve prikazane kvadrature su približne(cca). Tačne kvadrature iskazane su u pojedinačnim komercijalnim skicama i dostupne su na zahtev
    </p>
</main>
<script>
var url = "{{asset('storage/'.$apartmant->pdf)}}";

const pdfjsLib = window["pdfjs-dist/build/pdf"];
const element = document.getElementById("mainId");

element.classList.add("body-loading");

pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";

async function renderPDF() {
    try {
        const pdf = await pdfjsLib.getDocument(url).promise;
        const page = await pdf.getPage(1);

        const scale = 1.5;
        const viewport = page.getViewport({ scale });

        const canvas = document.getElementById("pdfCanvas");
        const context = canvas.getContext("2d");

        canvas.width = viewport.width;
        canvas.height = viewport.height;

        const renderContext = {
            canvasContext: context,
            viewport: viewport,
        };

        await page.render(renderContext);
        setTimeout(function wait(){

        element.classList.remove("body-loading");
    }, 3000);

    } catch (error) {
        console.error("Greška prilikom učitavanja PDF-a:", error);
        element.classList.remove("body-loading");
    }
}

renderPDF();

</script>
@include('partials/footer')
