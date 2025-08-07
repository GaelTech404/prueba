<div>
    <div id="temporizador">00:00</div>

    <!-- Este input debe coincidir con el id del Hidden de Filament -->
    <input type="hidden" id="tiempo_validacion" name="data[tiempo_validacion]" value="00:00">

    <button type="button" id="startButton">Iniciar</button>
    <button type="button" id="stopButton">Detener</button>
</div>

<script>
    let timer;
    let seconds = 0;

    const display = document.getElementById('temporizador');
    const inputHidden = document.getElementById('tiempo_validacion');

    function formatTime(seconds) {
        const min = String(Math.floor(seconds / 60)).padStart(2, '0');
        const sec = String(seconds % 60).padStart(2, '0');
        return `${min}:${sec}`;
    }

    document.getElementById('startButton').addEventListener('click', () => {
        if (timer) return; // Ya está corriendo
        timer = setInterval(() => {
            seconds++;
            const tiempo = formatTime(seconds);
            display.textContent = tiempo;
            inputHidden.value = tiempo;
        }, 1000);
    });

    document.getElementById('stopButton').addEventListener('click', () => {
        clearInterval(timer);
        timer = null;
    });
</script>