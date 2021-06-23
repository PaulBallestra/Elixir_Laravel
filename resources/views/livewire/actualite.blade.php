<div class="divActualite" style="background-image: url({{ $image }})">

    <div class="divActualiteInfos">

        <p class="actualiteDate"> {{ $date }} </p>
        <h3 class="actualiteTitle"> {{ $name }} </h3>
        <div class="grid grid-cols-6 gap-4">
            <p class="actualiteContent col-start-1 col-end-6"> {{ $shortDescription }} </p>
        </div>

        <div class="flex justify-end">
            <a href="actualites/{{ $id_actualite }}"><p class="actualiteBtnSuite justify-content-end"> Lire la suite >> </p></a>
        </div>

    </div>
</div>
