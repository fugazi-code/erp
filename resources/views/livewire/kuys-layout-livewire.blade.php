<div>
    <div class="row mt-2" style="height: 82vh;">
        <div class="col-5 border border-dark">
            <div class="row">
                <div class="col-md-12">
                    <h2>Family Section</h2>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary mx-auto w-50 h1 py-3 {{ $tables['table-10'] }}" wire:click="gotoPOS('{{ '10' }}')" style="margin-top: 15%;">10</button>
                    <button type="button" class="btn btn-primary mx-auto w-50 h1 py-3 {{ $tables['table-11'] }}" wire:click='gotoPOS("{{ '11' }}")' style="margin-top: 15%;">11</button>
                    <button type="button" class="btn btn-primary mx-auto w-50 h1 py-3 {{ $tables['table-12'] }}" wire:click='gotoPOS("{{ '12' }}")' style="margin-top: 15%;">12</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary mx-auto w-50 h1 py-3 {{ $tables['table-08'] }}" wire:click='gotoPOS("{{ '08' }}")' style="margin-top: 15%;">08</button>
                    <button type="button" class="btn btn-primary mx-auto w-50 h1 py-3 {{ $tables['table-09'] }}" wire:click='gotoPOS("{{ '09' }}")' style="margin-top: 15%;">09</button>
                </div>
            </div>
        </div>
        <div class="col-5 border border-dark">
            <div class="row">
                <div class="col-md-12">
                    <h2>Bachelor Section</h2>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-04'] }}" wire:click='gotoPOS("{{ '04' }}")' style="margin-top: 15%;">04</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-05'] }}" wire:click='gotoPOS("{{ '05' }}")' style="margin-top: 15%;">05</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-06'] }}" wire:click='gotoPOS("{{ '06' }}")' style="margin-top: 30%;">06</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-07'] }}" wire:click='gotoPOS("{{ '07' }}")' style="margin-top: 15%;">07</button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-s1'] }}" wire:click='gotoPOS("{{ '' }}")' style="margin-top: 34%;">s1</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-s2'] }}" wire:click='gotoPOS("{{ '' }}")' style="margin-top: 30%;">s2</button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-BONG'] }}" wire:click='gotoPOS("{{ 'BONG' }}")' style="margin-top: 15%;">BONG</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-01'] }}" wire:click='gotoPOS("{{ '01' }}")' style="margin-top: 15%;">01</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-02'] }}" wire:click='gotoPOS("{{ '02' }}")' style="margin-top: 15%;">02</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-03'] }}" wire:click='gotoPOS("{{ '03' }}")' style="margin-top: 15%;">03</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h1 py-3 {{ $tables['table-MAT'] }}" wire:click='gotoPOS("{{ 'MAT' }}")' style="margin-top: 15%;">MAT</button>
                </div>
            </div>
        </div>
        <div class="col-2 border border-dark">
            <div class="row">
                <div class="col-md-12">
                    <h2>Out</h2>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary mx-auto w-75 h3 py-1 {{ $tables['table-A'] }}" wire:click='gotoPOS("{{ 'A' }}")' style="margin-top: 15%;">A</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h3 py-1 {{ $tables['table-B'] }}" wire:click='gotoPOS("{{ 'B' }}")' style="margin-top: 15%;">B</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h3 py-1 {{ $tables['table-C'] }}" wire:click='gotoPOS("{{ 'C' }}")' style="margin-top: 15%;">C</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h3 py-1 {{ $tables['table-D'] }}" wire:click='gotoPOS("{{ 'D' }}")' style="margin-top: 15%;">D</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h3 py-1 {{ $tables['table-E'] }}" wire:click='gotoPOS("{{ 'E' }}")' style="margin-top: 15%;">E</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h3 py-1 {{ $tables['table-F'] }}" wire:click='gotoPOS("{{ 'F' }}")' style="margin-top: 15%;">F</button>
                    <button type="button" class="btn btn-primary mx-auto w-75 h3 py-1 {{ $tables['table-G'] }}" wire:click='gotoPOS("{{ 'G' }}")' style="margin-top: 15%;">G</button>
                </div>
            </div>
        </div>
    </div>
</div>
