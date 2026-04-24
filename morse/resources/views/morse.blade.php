<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morse Code Simulator</title>
    <style>
        :root {
            color-scheme: light;
            --bg-1: #09111f;
            --bg-2: #14314b;
            --panel: rgba(10, 19, 32, 0.78);
            --panel-border: rgba(255, 255, 255, 0.12);
            --text: #eff6ff;
            --muted: #9fb2c7;
            --accent: #8fe3ff;
            --accent-strong: #31c7ff;
            --dot: #7df1a5;
            --dash: #ffd15c;
            --shadow: 0 24px 90px rgba(0, 0, 0, 0.4);
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            min-height: 100%;
        }

        body {
            font-family: "Trebuchet MS", "Segoe UI", sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(49, 199, 255, 0.22), transparent 30%),
                radial-gradient(circle at bottom right, rgba(125, 241, 165, 0.16), transparent 28%),
                linear-gradient(145deg, var(--bg-1), var(--bg-2));
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .app {
            width: min(960px, 100%);
            padding: 28px;
            border: 1px solid var(--panel-border);
            border-radius: 28px;
            background: var(--panel);
            backdrop-filter: blur(18px);
            box-shadow: var(--shadow);
        }

        .headline {
            display: grid;
            gap: 10px;
            margin-bottom: 28px;
        }

        .eyebrow {
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: var(--accent);
            font-size: 0.75rem;
            margin: 0;
        }

        h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3.5rem);
            line-height: 1.05;
        }

        .subhead {
            margin: 0;
            max-width: 60ch;
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.6;
        }

        .grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 18px;
        }

        .card {
            border: 1px solid var(--panel-border);
            border-radius: 24px;
            padding: 22px;
            background: rgba(255, 255, 255, 0.03);
        }

        .stage {
            display: grid;
            gap: 18px;
        }

        .button-wrap {
            display: grid;
            place-items: center;
            padding: 20px 0 12px;
        }

        .morse-button {
            width: min(100%, 320px);
            min-height: 172px;
            border: 0;
            border-radius: 999px;
            color: #06111d;
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            background: linear-gradient(180deg, #ddf8ff, #77dcff 62%, #39bfff);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.7), 0 18px 40px rgba(15, 102, 145, 0.4);
            cursor: pointer;
            user-select: none;
            touch-action: none;
            transition: transform 120ms ease, box-shadow 120ms ease;
        }

        .morse-button:active,
        .morse-button.is-pressed {
            transform: translateY(3px) scale(0.99);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.7), 0 8px 20px rgba(15, 102, 145, 0.34);
        }

        .morse-button .label {
            display: block;
            font-size: 0.8rem;
            letter-spacing: 0.16em;
            margin-top: 8px;
            opacity: 0.8;
        }

        .status {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: center;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .status strong {
            color: var(--text);
        }

        .tape {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            min-height: 92px;
            align-content: flex-start;
        }

        .symbol {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            min-height: 52px;
            padding: 0 18px;
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            color: #081119;
        }

        .symbol.dot {
            min-width: 52px;
            background: linear-gradient(180deg, #c8ffd8, var(--dot));
        }

        .symbol.dash {
            min-width: 88px;
            background: linear-gradient(180deg, #fff1b8, var(--dash));
        }

        .placeholder {
            color: var(--muted);
            font-size: 0.95rem;
            padding: 6px 0;
        }

        .output {
            display: grid;
            gap: 14px;
        }

        .output-box {
            min-height: 140px;
            border-radius: 20px;
            padding: 16px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255,255,255,0.08);
            font-family: "Courier New", Courier, monospace;
            font-size: 1.2rem;
            line-height: 1.8;
            color: #ecf8ff;
            white-space: pre-wrap;
            word-break: break-word;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .action-button {
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 999px;
            background: rgba(255,255,255,0.06);
            color: var(--text);
            padding: 12px 18px;
            font: inherit;
            cursor: pointer;
            transition: background 120ms ease, transform 120ms ease;
        }

        .action-button:hover {
            background: rgba(255,255,255,0.12);
        }

        .action-button:active {
            transform: translateY(1px);
        }

        .hint {
            margin: 0;
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        @media (max-width: 820px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .app {
                padding: 18px;
                border-radius: 22px;
            }

            .card {
                padding: 18px;
            }
        }
    </style>
</head>
<body>
    <main class="app">
        <section class="headline">
            <p class="eyebrow">Laravel Morse Simulator</p>
            <h1>Tap for a dot. Hold for a dash.</h1>
            <p class="subhead">
                Press the button, release quickly for <strong>dot</strong>, or keep holding past the threshold for <strong>dash</strong>.
                The tape below gives you a live visual of every symbol you enter.
            </p>
        </section>

        <section class="grid">
            <div class="card stage">
                <div class="button-wrap">
                    <button id="morseButton" class="morse-button" type="button">
                        Hold to signal
                        <span class="label">Tap = dot · Hold = dash</span>
                    </button>
                </div>

                <div class="status">
                    <span>Last input: <strong id="lastSymbol">None</strong></span>
                    <span>Hold threshold: <strong>350 ms</strong></span>
                </div>

                <div>
                    <div class="status" style="margin-bottom: 10px;">
                        <span>Morse tape</span>
                        <span id="pressState">Ready</span>
                    </div>
                    <div id="tape" class="tape" aria-live="polite"></div>
                    <p id="emptyTape" class="placeholder">Your signals will appear here as colored chips.</p>
                </div>
            </div>

            <aside class="card output">
                <div>
                    <div class="status" style="margin-bottom: 10px;">
                        <span>Raw sequence</span>
                        <span>Copy-friendly</span>
                    </div>
                    <div id="rawOutput" class="output-box">No input yet.</div>
                </div>

                <div class="actions">
                    <button id="clearButton" class="action-button" type="button">Clear</button>
                </div>

                <p class="hint">
                    You can click with a mouse or press and hold on a touch screen. This is intentionally basic, so the symbol capture stays obvious.
                </p>
            </aside>
        </section>
    </main>

    <script>
        const thresholdMs = 350;
        const button = document.getElementById('morseButton');
        const tape = document.getElementById('tape');
        const emptyTape = document.getElementById('emptyTape');
        const rawOutput = document.getElementById('rawOutput');
        const lastSymbol = document.getElementById('lastSymbol');
        const pressState = document.getElementById('pressState');
        const clearButton = document.getElementById('clearButton');

        let pressStartedAt = 0;
        let activePointerId = null;
        let symbols = [];

        function render() {
            tape.innerHTML = '';

            if (!symbols.length) {
                emptyTape.hidden = false;
                rawOutput.textContent = 'No input yet.';
                lastSymbol.textContent = 'None';
                return;
            }

            emptyTape.hidden = true;
            rawOutput.textContent = symbols.map((symbol) => (symbol === 'dot' ? '·' : '—')).join(' ');
            lastSymbol.textContent = symbols[symbols.length - 1] === 'dot' ? 'Dot' : 'Dash';

            symbols.forEach((symbol) => {
                const chip = document.createElement('span');
                chip.className = `symbol ${symbol}`;
                chip.textContent = symbol === 'dot' ? '•' : '—';
                tape.appendChild(chip);
            });
        }

        function finishPress() {
            if (!pressStartedAt) {
                return;
            }

            const elapsed = performance.now() - pressStartedAt;
            pressStartedAt = 0;
            button.classList.remove('is-pressed');
            pressState.textContent = 'Ready';

            const symbol = elapsed >= thresholdMs ? 'dash' : 'dot';
            symbols.push(symbol);
            pressState.textContent = symbol === 'dot' ? 'Registered dot' : 'Registered dash';
            render();
        }

        button.addEventListener('pointerdown', (event) => {
            if (!event.isPrimary || pressStartedAt) {
                return;
            }

            activePointerId = event.pointerId;
            pressStartedAt = performance.now();
            button.classList.add('is-pressed');
            pressState.textContent = 'Holding...';
            button.setPointerCapture(activePointerId);
        });

        button.addEventListener('pointerup', () => {
            finishPress();
            activePointerId = null;
        });

        button.addEventListener('pointercancel', () => {
            pressStartedAt = 0;
            activePointerId = null;
            button.classList.remove('is-pressed');
            pressState.textContent = 'Ready';
        });

        clearButton.addEventListener('click', () => {
            symbols = [];
            pressStartedAt = 0;
            activePointerId = null;
            button.classList.remove('is-pressed');
            pressState.textContent = 'Ready';
            render();
        });

        render();
    </script>
</body>
</html>