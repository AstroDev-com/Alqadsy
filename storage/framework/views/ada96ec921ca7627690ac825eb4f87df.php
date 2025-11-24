<?php if(Session::has('success')): ?>
    <div class="neo-alert success" role="alert" data-audio="success-sound.mp3">
        <div class="alert-core">
            <div class="floating-icon">
                <svg class="hyper-check" viewBox="0 0 100 100">
                    <circle class="circle" cx="50" cy="50" r="45" />
                    <path class="check" d="M30,50 L45,65 L70,35" />
                </svg>
            </div>
            <div class="content-wrapper">
                <h3 class="neon-title">🎉 تم بنجاح!</h3>
                <p class="hologram-text"><?php echo e(Session::get('success')); ?></p>
            </div>
            <div class="interactive-controls">
                <button class="morph-button" aria-label="إغلاق">
                    <div class="hologram-disc">
                        <svg class="close-x" viewBox="0 0 24 24">
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
        <div class="nanotech-progress"></div>
    </div>
<?php endif; ?>

<style>
    :root {
        --neo-success: linear-gradient(135deg, #a1dfc2 0%, #3197ac 100%);
        --glow-color: rgba(0, 255, 136, 0.2);
    }

    .neo-alert {
        position: fixed;
        top: 6.5rem;
        right: 1.5rem;
        width: 320px;
        background: rgba(255, 255, 255, 0.98);
        border-radius: 16px;
        padding: 1rem;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(0, 0, 0, 0.08);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05),
            inset 0 0 0 1px rgba(255, 255, 255, 0.5);
        transform: translateX(120%) rotateY(30deg);
        animation: neoEntrance 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        overflow: hidden;
        z-index: 9999;
        cursor: grab;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .neo-alert.exit {
        animation: neoExit 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
    }

    @keyframes neoEntrance {
        0% {
            transform: translateX(120%) rotateY(30deg);
            opacity: 0;
        }

        100% {
            transform: translateX(0) rotateY(0);
            opacity: 1;
        }
    }

    @keyframes neoExit {
        0% {
            transform: translateX(0);
            opacity: 1;
        }

        100% {
            transform: translateX(120%) rotateY(-30deg);
            opacity: 0;
        }
    }

    .alert-core {
        position: relative;
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: 1rem;
        align-items: center;
        z-index: 2;
    }

    .floating-icon {
        position: relative;
        width: 48px;
        height: 48px;
        background: transparent;
        border-radius: 50%;
        display: grid;
        place-items: center;
        animation: float 3s ease-in-out infinite;
        box-shadow: inset 0 0 0 1px rgba(0, 255, 136, 0.1);
    }

    .circle {
        fill: none;
        stroke: #4c886b;
        stroke-width: 2.5;
        stroke-dasharray: 283;
        stroke-dashoffset: 283;
        animation: circleDraw 1s ease-out forwards;
        filter: drop-shadow(0 0 1px rgba(0, 255, 136, 0.3));
    }

    .check {
        fill: none;
        stroke: #52bb8a;
        stroke-width: 2.5;
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
        animation: checkDraw 0.8s ease-out 0.5s forwards;
        filter: drop-shadow(0 0 1px rgba(0, 255, 136, 0.3));
    }

    @keyframes circleDraw {
        to {
            stroke-dashoffset: 0;
        }
    }

    @keyframes checkDraw {
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
        background: rgba(0, 255, 136, 0.08);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
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

    .neon-title {
        color: #2c3e50;
        font-size: 1.1rem;
        margin: 0;
        font-weight: 600;
        letter-spacing: 0.3px;
        position: relative;
        padding-left: 0.5rem;
    }

    /* .neon-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 60%;
        background: #127e4b;
        border-radius: 2px;
        opacity: 0.5;
    } */

    /* .hologram-text {
        color: #666;
        font-size: 0.85rem;
        line-height: 1.4;
        margin: 0.35rem 0 0;
        position: relative;
        padding-left: 1.25rem;
        letter-spacing: 0.2px;
    }

    .hologram-text::before {
        content: "▹";
        position: absolute;
        left: 0;
        color: #00ff88;
    } */

    .morph-button {
        width: 32px;
        height: 32px;
        background: rgba(0, 0, 0, 0.04);
        border: none;
        border-radius: 10px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
        overflow: hidden;
        box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.05);
    }

    .morph-button:hover {
        transform: rotate(90deg) scale(1.1);
        background: rgba(0, 0, 0, 0.08);
        box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1);
    }

    .close-x {
        width: 24px;
        height: 24px;
        fill: #666;
        transition: transform 0.3s ease;
    }

    .nanotech-progress {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 4px;
        background: var(--neo-success);
        animation: nanoProgress 5s linear forwards;
        box-shadow: 0 0 5px rgba(0, 255, 136, 0.2);
    }

    @keyframes nanoProgress {
        0% {
            width: 100%;
            opacity: 1;
        }

        100% {
            width: 0;
            opacity: 0;
        }
    }

    .neo-alert:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    }

    .neo-alert:active {
        cursor: grabbing;
        transform: scale(0.98);
    }

    @media (max-width: 768px) {
        .neo-alert {
            width: 90%;
            right: 5%;
            top: 1rem;
            padding: 1rem;
        }

        .floating-icon {
            width: 50px;
            height: 50px;
        }

        .neon-title {
            font-size: 1.2rem;
        }
    }
</style>

<script>
    document.querySelectorAll('.neo-alert').forEach(alert => {
        // تفاعل السحب والإسقاط
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

        // التحكم الصوتي
        const audio = new Audio(alert.dataset.audio);
        audio.volume = 0.3;
        audio.play();

        // الإغلاق التلقائي مع التفاعل
        let timeout = setTimeout(() => closeAlert(alert), 5000);

        alert.addEventListener('mouseenter', () => {
            clearTimeout(timeout);
            alert.querySelector('.nanotech-progress').style.animationPlayState = 'paused';
        });

        alert.addEventListener('mouseleave', () => {
            timeout = setTimeout(() => closeAlert(alert), 5000);
            alert.querySelector('.nanotech-progress').style.animationPlayState = 'running';
        });

        // إغلاق بالنقر
        alert.querySelector('.morph-button').addEventListener('click', () => closeAlert(alert));
    });

    function closeAlert(alert) {
        alert.style.animation = 'neoExit 0.6s forwards';
        setTimeout(() => alert.remove(), 600);
    }
</script>
<?php /**PATH D:\All My Project\GitHub_Project\Alqadsy\Alqadsy\resources\views/admin/includes/alerts/success.blade.php ENDPATH**/ ?>