<nav class="d-flex flex-column">
    <div id="app">
        <div id="welcome" class="welcome_doc">
            <h1>Benvenuto nella tua Dashboard</h1>
            @if (optional(Auth::user()->profile)->genere)
                <h2><i class="fas fa-user-md" style="font-size: 2.2rem;"></i>
                @if (optional(Auth::user()->profile)->genere == 'femmina')
                    <span>Dott.ssa </span>
                @else
                    <span>Dott.</span> 
                @endif
                {{Auth::user()->cognome}} {{Auth::user()->nome}} </h2>
            @endif
        </div>
        <div class=" component-main-container">
            <div class="chart-component-container">
                <h3>Statistiche Recensioni Mensili</h3>
                <chart-month-retings-component></chart-month-retings-component>
            </div>
            <div class="chart-component-container">
                <h3>Statistiche Messaggi Mensili</h3>
                <chart-month-messages-component></chart-month-messages-component>
            </div>
        </div>
    </div>

</nav>
