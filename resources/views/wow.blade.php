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
    body {
        font-family: "Raleway", sans-serif;
    }
    h1 {
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 0.75rem;
    }
    button {
        border-radius: 3px;
        border: 1px solid #e2e8f0;
        padding:6px 10px;
    }
    .js-tailwind-x-grid {

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

    import Button from "../js/Pages/Editor/Button";
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
    export default {
        components: {Button}
    }
</script>

<div>
    <div class="js-tailwind-x-grid" tailwind-x:editable="true">

        <button style="z-index:1;grid-area: 6 / 3 / 7/ 9;" type="text">Mega qk Button</button>

        <h1 style="z-index:1;grid-area: 2 / 3 / 4/ 7;background: red;">Cool Title</h1>
        <h1 style="z-index:1;grid-area: 4 / 3 / 4/ -13;background: #ffefef;">This is cool text here</h1>

    </div>
</div>
