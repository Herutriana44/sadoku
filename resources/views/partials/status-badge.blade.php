@php
$badges = [
    'diajukan'               => 'bg-blue-100 text-blue-700',
    'perbaikan_administrasi' => 'bg-orange-100 text-orange-700',
    'proses_telaah'          => 'bg-indigo-100 text-indigo-700',
    'perbaikan_minor'        => 'bg-yellow-100 text-yellow-700',
    'perbaikan_mayor'        => 'bg-orange-100 text-orange-800',
    'disetujui'              => 'bg-green-100 text-green-700',
    'tidak_disetujui'        => 'bg-red-100 text-red-700',
];
$labels = [
    'diajukan'               => 'Diajukan',
    'perbaikan_administrasi' => 'Perbaikan Adm.',
    'proses_telaah'          => 'Proses Telaah',
    'perbaikan_minor'        => 'Perbaikan Minor',
    'perbaikan_mayor'        => 'Perbaikan Mayor',
    'disetujui'              => 'Disetujui',
    'tidak_disetujui'        => 'Tidak Disetujui',
];
$class = $badges[$status] ?? 'bg-gray-100 text-gray-600';
$label = $labels[$status] ?? $status;
@endphp
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $class }}">
    {{ $label }}
</span>
