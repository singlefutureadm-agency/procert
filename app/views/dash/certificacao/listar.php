<?php
// --- calcula índice atual / progresso ---
$totalSteps = count($certificacao);
$currentIndex = -1;
$lastCompleted = -1;

foreach ($certificacao as $i => $row) {
    $statusLower = strtolower($row['status_novo'] ?? $row['status_atual'] ?? '');
    if (str_contains($statusLower, 'andam') || str_contains($statusLower, 'em_andamento') || str_contains($statusLower, 'em andamento')) {
        $currentIndex = $i;
        break;
    }
    if (str_contains($statusLower, 'conclu')) {
        $lastCompleted = $i;
    }
}
if ($currentIndex === -1) {
    if ($lastCompleted !== -1) $currentIndex = $lastCompleted;
    else $currentIndex = 0;
}
$progressPercent = ($totalSteps > 1) ? round(($currentIndex / ($totalSteps - 1)) * 100, 2) : 100;

// Função para formatar data
function formatDateTime($datetimeStr) {
    if (!$datetimeStr) return '-';
    $dt = new DateTime($datetimeStr);
    return $dt->format('d/m/Y H:i'); // Ex: 22/11/2025 16:00
}
?>

<!-- TIMELINE iFOOD-LIKE -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white fw-semibold text-center">
        Histórico de Certificação
    </div>

    <div class="card-body">
        <style>
            :root { --timeline-height: 6px; --dot-size: 40px; --dot-size-sm: 34px; }
            .timeline-wrap { position: relative; padding: 2.2rem 0 1.2rem; }
            .timeline-bar { position: absolute; left: 10px; right: 10px; top: calc(var(--dot-size)/2 + 2px); height: var(--timeline-height); background: #e9ecef; border-radius: 6px; z-index: 0; }
            .timeline-progress { position: absolute; left: 10px; top: calc(var(--dot-size)/2 + 2px); height: var(--timeline-height); background: var(--bs-primary); border-radius: 6px; z-index: 1; }

            .timeline-list { display: flex; gap: 1rem; align-items: flex-start; justify-content: center; overflow-x: auto; padding: 0.6rem 8px 0 8px; scroll-behavior: smooth; z-index: 2; }
            .timeline-step { flex: 0 0 220px; text-align: center; position: relative; padding-top: 6px; }
            .timeline-step .dot { width: var(--dot-size); height: var(--dot-size); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: #fff; font-size: 1rem; box-shadow: 0 6px 18px rgba(13,110,253,0.12); z-index: 3; position: relative; border: 4px solid #fff; }
            .timeline-step.completed .dot { background: var(--bs-success); }
            .timeline-step.pending .dot { background: #f1f3f5; color: #6c757d; box-shadow: none; border-color: #e9ecef; }
            .timeline-step.delayed .dot { background: var(--bs-danger); }
            .timeline-step.current .dot { background: var(--bs-primary); transform: scale(1.07); animation: pulse 1.8s infinite; }
            @keyframes pulse { 0% { box-shadow:0 0 0 0 rgba(13,110,253,0.28); } 70% { box-shadow:0 0 0 14px rgba(13,110,253,0); } 100% { box-shadow:0 0 0 0 rgba(13,110,253,0); } }

            .step-title { margin-top: .6rem; font-weight: 600; font-size: .95rem; }
            .step-sub { font-size: .82rem; color: #6c757d; margin-top: .25rem; }
            .step-desc { margin-top: .35rem; font-size: .88rem; color: #495057; min-height: 2.2rem; }

            @media (max-width: 768px) {
                :root { --dot-size: var(--dot-size-sm); }
                .timeline-step { flex: 0 0 160px; }
                .timeline-bar { top: calc(var(--dot-size)/2 + 2px); left: 6px; right: 6px; }
                .timeline-progress { left: 6px; }
            }

            .timeline-list::-webkit-scrollbar { height: 8px; }
            .timeline-list::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.08); border-radius: 8px; }
        </style>

        <div class="timeline-wrap">
            <div class="timeline-bar"></div>
            <div class="timeline-progress" style="width: <?= $progressPercent ?>%;"></div>

            <div class="timeline-list align-items-start">
                <?php foreach ($certificacao as $idx => $d):
                    $statusLower = strtolower($d['status_novo'] ?? $d['status_atual'] ?? '');
                    $state = 'pending';
                    if (str_contains($statusLower, 'conclu')) $state='completed';
                    if (str_contains($statusLower, 'andam') || str_contains($statusLower, 'em_andamento') || str_contains($statusLower, 'em andamento')) $state='current';
                    if (str_contains($statusLower, 'atras')) $state='delayed';
                    if ($idx < $currentIndex) $state='completed';
                    if ($idx == $currentIndex && $state!=='current') $state='current';

                    $etapa = htmlspecialchars($d['etapa'] ?? '-', ENT_QUOTES, 'UTF-8');
                    $statusNovo = htmlspecialchars($d['status_novo'] ?? ($d['status_atual'] ?? '-'), ENT_QUOTES, 'UTF-8');
                    $dataAlt = formatDateTime($d['alterado_em'] ?? $d['atualizado_em_atual'] ?? '');
                    $obs = htmlspecialchars($d['observacao_atual'] ?? $d['historico_observacao'] ?? '', ENT_QUOTES, 'UTF-8');
                    $alteradoPor = htmlspecialchars($d['alterado_por'] ?? '-', ENT_QUOTES, 'UTF-8');

                    $iconHtml = '<i class="bi bi-clock-fill"></i>';
                    if ($state==='completed') $iconHtml='<i class="bi bi-check-lg"></i>';
                    if ($state==='current') $iconHtml='<i class="bi bi-arrow-repeat"></i>';
                    if ($state==='delayed') $iconHtml='<i class="bi bi-exclamation-lg"></i>';
                ?>
                    <div class="timeline-step <?= $state ?>">
                        <div class="dot"><?= $iconHtml ?></div>
                        <div class="step-title"><?= $etapa ?></div>
                        <div class="step-sub mb-1">
                            <span class="badge bg-<?= ($state==='pending'?'secondary':($state==='delayed'?'danger':($state==='completed'?'success':'primary'))) ?>">
                                <?= $statusNovo ?>
                            </span>
                        </div>
                        <div class="step-sub mb-1"><?= $dataAlt ?> <br></div>
                        <div class="step-desc"><?= !empty($obs) ? (strlen($obs)>120 ? substr($obs,0,117).'...' : $obs) : '&nbsp;' ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
