<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["HCGA", "PROC", "RMMS", "AMP", "PCAHE", "AMTD", "BD", "OP1", "MSA1", "OP2", "MSA2", "OP3", "MSA3", "PM", "CPFTA", "RMQ", "FTA"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $hcga['total_paket'] ?>, <?= $proc['total_paket'] ?>, <?= $rmms['total_paket'] ?>, <?= $amp['total_paket'] ?>, <?= $pcahe['total_paket'] ?>, <?= $amtd['total_paket'] ?>, <?= $bd['total_paket'] ?>, <?= $op1['total_paket'] ?>, <?= $msa1['total_paket'] ?>, <?= $op2['total_paket'] ?>, <?= $msa2['total_paket'] ?>, <?= $op3['total_paket'] ?>, <?= $msa3['total_paket'] ?>, <?= $pm['total_paket'] ?>, <?= $cpfta['total_paket'] ?>, <?= $rmq['total_paket'] ?>, <?= $fta['total_paket'] ?>, ],
                    backgroundColor: [
                        '#FF3333',
                        '#00FF00',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["HCGA", "PROC", "RMMS", "AMP", "PCAHE", "AMTD", "BD", "OP1", "MSA1", "OP2", "MSA2", "OP3", "MSA3", "PM", "CPFTA", "RMQ", "FTA"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $hcga['total_paket'] ?>, <?= $proc['total_paket'] ?>, <?= $rmms['total_paket'] ?>, <?= $amp['total_paket'] ?>, <?= $pcahe['total_paket'] ?>, <?= $amtd['total_paket'] ?>, <?= $bd['total_paket'] ?>, <?= $op1['total_paket'] ?>, <?= $msa1['total_paket'] ?>, <?= $op2['total_paket'] ?>, <?= $msa2['total_paket'] ?>, <?= $op3['total_paket'] ?>, <?= $msa3['total_paket'] ?>, <?= $pm['total_paket'] ?>, <?= $cpfta['total_paket'] ?>, <?= $rmq['total_paket'] ?>, <?= $fta['total_paket'] ?>, ],
                    backgroundColor: [
                        '#FF3333',
                        '#00FF00',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    hoverOffset: 4
                }]
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart3").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ["HCGA", "PROC", "RMMS", "AMP", "PCAHE", "AMTD", "BD", "OP1", "MSA1", "OP2", "MSA2", "OP3", "MSA3", "PM", "CPFTA", "RMQ", "FTA"],
                datasets: [{
                    label: '',
                    data: [<?= $hcga['total_paket'] ?>, <?= $proc['total_paket'] ?>, <?= $rmms['total_paket'] ?>, <?= $amp['total_paket'] ?>, <?= $pcahe['total_paket'] ?>, <?= $amtd['total_paket'] ?>, <?= $bd['total_paket'] ?>, <?= $op1['total_paket'] ?>, <?= $msa1['total_paket'] ?>, <?= $op2['total_paket'] ?>, <?= $msa2['total_paket'] ?>, <?= $op3['total_paket'] ?>, <?= $msa3['total_paket'] ?>, <?= $pm['total_paket'] ?>, <?= $cpfta['total_paket'] ?>, <?= $rmq['total_paket'] ?>, <?= $fta['total_paket'] ?>, ],
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.5)',
                        'rgba(60, 179, 113, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                    ],
                    hoverOffset: 4
                }]
            },
        });
    });
</script>


<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart4").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart5").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart6").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ["Barang", "Jasa Pemborongan", "Jasa Konsultansi", "Jasa Lain"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $total_barang_semua_paket ?>, <?= $total_pemborongan_semua_paket ?>, <?= $total_konsultansi_semua_paket ?>, <?= $total_lain_semua_paket ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    hoverOffset: 4
                }]
            },
        });
    });
</script>


<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart7").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Vendor Aktif", "Vendor Non-Aktif", "Blacklist"],
                datasets: [{
                    data: [<?= $total_vendor_fix ?>, <?= $get_vendor3['total_vendor'] ?>, <?= $get_vendor3['total_vendor'] ?>],
                    backgroundColor: [
                        '#00FF00', '#FF3333', '#404040',
                    ],
                }, ],
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("myChart8").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Vendor Aktif", "Vendor Non-Aktif", "Blacklist"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?= $total_vendor_fix ?>, <?= $get_vendor3['total_vendor'] ?>, <?= $get_vendor3['total_vendor'] ?>],
                    backgroundColor: [
                        '#00FF00',
                        '#FF3333',
                        '#404040',
                    ],
                    hoverOffset: 4
                }]
            },
        });
    });
</script>