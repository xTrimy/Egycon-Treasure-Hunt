<!DOCTYPE html>
<html class="w-full min-h-full dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/main.js') }}" defer></script>
    <script>
        window._asset = '{{ asset('') }}';
    </script>
    @inertiaHead
</head>

<body class="w-full h-full !m-0">
    <div class="fixed w-full h-full bg-black z-50 flex items-center justify-center" id="document-loader">
        <div class="text-center text-xl">
            <div class="w-24 h-24 flex justify-center items-center mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 150">
                    <path fill="none" stroke="#FFFFFF" stroke-width="15" stroke-linecap="round"
                        stroke-dasharray="300 385" stroke-dashoffset="0"
                        d="M275 75c0 31-27 50-50 50-58 0-92-100-150-100-28 0-50 22-50 50s23 50 50 50c58 0 92-100 150-100 24 0 50 19 50 50Z">
                        <animate attributeName="stroke-dashoffset" calcMode="spline" dur="2" values="685;-685"
                            keySplines="0 0 1 1" repeatCount="indefinite"></animate>
                    </path>
                </svg>
            </div>
            <p>
                <b>
                    Loading
                </b>
            </p>
            <p id="loading-phrase" class="text-sm">
                Hang Tight
            </p>
        </div>
    </div>
    @inertia
</body>
<script>
    const loadingPhrases = [
        'Almost There',
        'Still Loading? 🤔',
        'Don\'t Worry. It will take less than a year 😉',
        'Herding cats... almost done!',
        'Warming up the servers...',
        'Polishing the pixels...',
        'Brewing coffee for the server hamsters...',
        'Loading awesomeness...',
        'Just a few more bits to flip...',
        'Assembling the unicorns...',
        'Inflating the data balloons...',
        'Downloading more RAM...',
        'Checking for alien interference...',
        'Calibrating the flux capacitor...',
        'While we\'re waiting, here\'s a fun fact: Did you know... (then insert a random fact API call)',
        'Please be patient. Good things take time... or a really fast internet connection.',
        'Loading... like a boss 😎',
        'Hold tight! We\'re almost ready to launch!',
        'Preparing for liftoff! 🚀',
        'Just adding a pinch of magic ✨',
        'Spinning up the hamster wheels 🐹',
        'Loading faster than a caffeinated cheetah 🐆',
        'Hold on, we\'re just aligning the stars ✨',
        'Loading... please don\'t feed the gremlins.',
        'Is it done yet? Nope, but almost! 😉',
        'Loading... like it\'s hot 🔥',
        'We\'re working hard so you don\'t have to... wait too long.',
        'Hang tight! We\'re just doing some digital heavy lifting 💪',
        'Loading... because magic doesn\'t happen instantly (usually).',
        'Please wait while we consult the oracle... 🔮',
        'Loading... like a snail on roller skates 🐌💨 (but faster, we promise!)',
        'Don\'t go anywhere!We\'re almost there! (Unless you really need to, then go ahead.)',
        'Loading... the suspense is killing us too! (almost)',
        'Just a moment while we gather the digital butterflies 🦋',
        'Loading... because even computers need a coffee break sometimes. ☕',
        'We\'re loading the good stuff! 🤩',
        'Loading... please stand by for awesomeness! 😎',
        'Loading... it\'s worth the wait! (we hope!)',
        'Loading... just like waiting for Christmas morning! 🎄',
        'Loading... because patience is a virtue. (but we\'ll be quick!)',
        'Loading... don\'t blink, you might miss it! (just kidding, it\'s still loading)',
        'Loading... we\'re not kitten around! 😻 (unless there are kittens involved)',
    ];

    const loadingPhrasesInterval = setInterval(() => {
        const randomIndex = Math.floor(Math.random() * loadingPhrases.length);
        document.getElementById('loading-phrase').innerText = loadingPhrases[randomIndex];
    }, 3000);
</script>

</html>
