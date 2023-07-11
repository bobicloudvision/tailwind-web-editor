@php

// desktop
$gridRows = 18;
$gridColumns = 18;


// mobile
//$gridRows = 29;
//$gridColumns = 10;

// rows - 29 - mobile
// column 10 - mobile
@endphp

<style>
    .js-tailwind-x-grid {

        margin-top:50px;
        margin-left:100px;
        background: #f5f5f5;

        width: 900px;
        height: 600px;

        display: grid;
        gap: 5px;

        grid-template-rows: repeat({{$gridRows}}, 1fr);
        grid-template-columns: repeat({{$gridColumns}}, 1fr);
    }

    .js-tailwind-x-grid-column {
        pointer-events: none;
        user-select: none;
        width:5px;
        background: #eeeeee;
        z-index: 0;
    }
    .js-tailwind-x-grid-row {
        pointer-events: none;
        user-select: none;
        height:5px;
        z-index: 0;
        background: #e7e7e7;
    }
</style>

<script>

    window.onload = function() {
        let grids = document.getElementsByClassName('js-tailwind-x-grid');
        for (let i = 0; i < grids.length; i++) {
            let currentGrid = grids[i];

            // Add grid columns display
            for (let gridColumnI = 1; gridColumnI < {{$gridColumns+1}}; gridColumnI++) {
                let gridColumn = document.createElement("div");
                gridColumn.setAttribute('style', 'opacity:0;grid-area: 1 / ' + gridColumnI + ' / -1 / ' + gridColumnI);
                gridColumn.classList.add('js-tailwind-x-grid-column');
                //gridColumn.innerHTML = 'x' + gridColumnI;

                currentGrid.append(gridColumn);
            }

            // Add grid rows display
            for (let gridRowI = 1; gridRowI < {{$gridRows+1}}; gridRowI++) {
                let gridRow = document.createElement("div");
                gridRow.setAttribute('style', 'opacity:0;grid-area: ' + gridRowI + ' / 1 / ' + gridRowI + '/ -1');
                gridRow.classList.add('js-tailwind-x-grid-row');
                //gridRow.innerHTML = 'y' + gridRowI;

                currentGrid.append(gridRow);
            }



        }
    };
</script>

<div>
    <div class="js-tailwind-x-grid" tailwind-x:editable="true">

        <button style="z-index:1;grid-area: 6 / 3 / 7/ 9;" type="text">Mega qk Button</button>

        <h1 style="z-index:1;grid-area: 2 / 3 / 4/ 7;background: red;">Cool Title</h1>
        <h1 style="z-index:1;grid-area: 4 / 3 / 4/ -13;background: #ffefef;">This is cool text here</h1>

    </div>
</div>
