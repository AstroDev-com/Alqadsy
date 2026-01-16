<?php if(Session::has('error')): ?>
    <div class="neo-alert error" role="alert" data-audio="error-sound.mp3">
        <div class="alert-core">
            <div class="floating-icon">
                <svg class="error-icon" viewBox="0 0 100 100">
                    <circle class="error-circle" cx="50" cy="50" r="45" />
                    <path class="error-cross" d="M35,35 L65,65 M65,35 L35,65" />
                </svg>
            </div>
            <div class="content-wrapper">
                <h3 class="error-title"><?php echo e(__('dashboard.error')); ?></h3>
                <p class="error-text"><?php echo e(Session::get('error')); ?></p>
            </div>
            <div class="interactive-controls">
                <button class="error-button" aria-label="إغلاق">
                    <div class="hologram-disc">
                        <svg class="close-x" viewBox="0 0 24 24">
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
        <div class="error-progress"></div>
    </div>
<?php endif; ?>

<style>
    .neo-alert.error {
        position: fixed;
        top: 6.5rem;
        right: 1.5rem;
        width: 320px;
        background: rgba(255, 255, 255, 0.98);
        border-radius: 16px;
        padding: 1rem;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 71, 87, 0.1);
        box-shadow: 0 4px 15px rgba(255, 71, 87, 0.1),
            inset 0 0 0 1px rgba(255, 255, 255, 0.5);
        transform: translateX(120%) rotateY(30deg);
        animation: errorEntrance 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        overflow: hidden;
        z-index: 9999;
        cursor: grab;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .neo-alert.error.exit {
        animation: errorExit 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
    }

    @keyframes errorEntrance {
        0% {
            transform: translateX(120%) rotateY(30deg);
            opacity: 0;
        }

        100% {
            transform: translateX(0) rotateY(0);
            opacity: 1;
        }
    }

    @keyframes errorExit {
        0% {
            transform: translateX(0);
            opacity: 1;
        }

        100% {
            transform: translateX(120%) rotateY(-30deg);
            opacity: 0;
        }
    }

    .error-icon .error-circle {
        fill: none;
        stroke: #ff4757;
        stroke-width: 2.5;
        stroke-dasharray: 283;
        stroke-dashoffset: 283;
        animation: errorCircleDraw 1s ease-out forwards;
        filter: drop-shadow(0 0 1px rgba(255, 71, 87, 0.3));
    }

    .error-icon .error-cross {
        fill: none;
        stroke: #ff4757;
        stroke-width: 2.5;
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
        animation: errorCrossDraw 0.8s ease-out 0.5s forwards;
        filter: drop-shadow(0 0 1px rgba(255, 71, 87, 0.3));
    }

    @keyframes errorCircleDraw {
        to {
            stroke-dashoffset: 0;
        }
    }

    @keyframes errorCrossDraw {
        to {
            stroke-dashoffset: 0;
        }
    }

    .floating-icon::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: rgba(255, 71, 87, 0.08);
        animation: errorPulse 2s infinite;
    }

    @keyframes errorPulse {
        0% {
            transform: scale(1);
            opacity: 0.1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.05;
        }

        100% {
            transform: scale(1);
            opacity: 0.1;
        }
    }

    .error-title {
        color: #ff4757;
        font-size: 1.1rem;
        margin: 0;
        font-weight: 600;
        letter-spacing: 0.3px;
        position: relative;
        padding-left: 0.5rem;
    }

    .error-text {
        color: #666;
        font-size: 0.85rem;
        line-height: 1.4;
        margin: 0.35rem 0 0;
        position: relative;
        padding-left: 1.25rem;
        letter-spacing: 0.2px;
    }

    .error-text::before {
        content: "⚠️";
        position: absolute;
        left: 0;
    }

    .error-button {
        width: 32px;
        height: 32px;
        background: rgba(255, 71, 87, 0.1);
        border: none;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: inset 0 0 0 1px rgba(255, 71, 87, 0.1);
    }

    .error-button:hover {
        transform: rotate(90deg) scale(1.1);
        background: rgba(255, 71, 87, 0.15);
    }

    .error-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 4px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ff4757 100%);
        animation: errorProgress 5s linear forwards;
        box-shadow: 0 0 5px rgba(255, 71, 87, 0.2);
    }

    @keyframes errorProgress {
        0% {
            width: 100%;
            opacity: 1;
        }

        100% {
            width: 0;
            opacity: 0;
        }
    }

    .neo-alert.error:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(255, 71, 87, 0.15);
    }

    .neo-alert.error:active {
        cursor: grabbing;
        transform: scale(0.98);
    }

    @media (max-width: 768px) {
        .neo-alert.error {
            width: 90%;
            right: 5%;
            top: 1rem;
            padding: 1rem;
        }
    }
</style>

<script>
    document.querySelectorAll('.neo-alert.error').forEach(alert => {
        let isDragging = false;
        let startX, startLeft;

        alert.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.clientX;
            startLeft = alert.offsetLeft;
            alert.style.transition = 'none';
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            const deltaX = e.clientX - startX;
            alert.style.left = `${startLeft + deltaX}px`;
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            alert.style.transition = 'all 0.3s ease';
        });

        const audio = new Audio(alert.dataset.audio);
        audio.volume = 0.3;
        audio.play();

        let timeout = setTimeout(() => closeAlert(alert), 5000);

        alert.addEventListener('mouseenter', () => {
            clearTimeout(timeout);
            alert.querySelector('.error-progress').style.animationPlayState = 'paused';
        });

        alert.addEventListener('mouseleave', () => {
            timeout = setTimeout(() => closeAlert(alert), 5000);
            alert.querySelector('.error-progress').style.animationPlayState = 'running';
        });

        alert.querySelector('.error-button').addEventListener('click', () => closeAlert(alert));
    });

    function closeAlert(alert) {
        alert.style.animation = 'errorExit 0.6s forwards';
        setTimeout(() => alert.remove(), 600);
    }
</script>
<?php /**PATH D:\All My Project\GitHub_Project\AstroDev GitHub\Alqadsy\Alqadsy_lastupdate\Alqadsy\resources\views/admin/includes/alerts/error.blade.php ENDPATH**/ ?>