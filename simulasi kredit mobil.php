<?php
// Daftar tipe mobil & harga (dalam Rupiah) — atur di sini kalau mau tambah/ubah tipe
$carModels = [
    "" => "Custom (atur harga manual)",
    150000000 => "Daihatsu Ayla",
    180000000 => "Toyota Agya",
    230000000 => "Honda Brio",
    260000000 => "Toyota Avanza",
    300000000 => "Daihatsu Xenia",
    350000000 => "Honda HR-V",
    450000000 => "Toyota Innova Zenix",
    550000000 => "Mitsubishi Pajero Sport",
    750000000 => "Toyota Fortuner",
];

$currentYear = date("Y");
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website Kredit Mobil Tanpa Ribet</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body style="padding-top: 76px">
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
        <div class="container">
          <a class="navbar-brand fw-bold" href="#">simulcars</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLinks" aria-controls="navLinks" aria-expanded="false" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navLinks">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-4 gap-2 mt-3 mt-lg-0">
              <li class="nav-item"><a class="nav-link" href="#simulasi">Simulasi</a></li>
              <li class="nav-item"><a class="nav-link" href="#cara-kerja">Cara Kerja</a></li>
              <li class="nav-item"><a class="nav-link" href="#syarat">Syarat</a></li>
              <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
              <li class="nav-item"><a class="btn btn-primary" href="#kontak">Ajukan Sekarang</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section class="bg-dark text-white py-5">
      <div class="container py-4">
        <div class="row g-5 align-items-start">
          <div class="col-lg-7">
            <p class="text-primary fw-semibold mb-3">Kredit mobil baru & bekas</p>
            <h1 class="display-4 fw-bold mb-4">Cicilan jelas sebelum kamu tanda tangan apa pun.</h1>
            <p class="lead text-white-50 mb-4">Masukkan harga mobil dan uang muka, lihat langsung berapa cicilan bulanannya — tanpa telepon sales, tanpa simulasi ngambang.</p>
            <div class="d-flex gap-3 flex-wrap">
              <a href="#simulasi" class="btn btn-primary btn-lg">Mulai Simulasi</a>
              <a href="#cara-kerja" class="btn btn-outline-light btn-lg">Lihat Cara Kerja</a>
            </div>
            <div class="row mt-5 text-center text-lg-start">
              <div class="col-4">
                <div class="fs-3 fw-bold">6,5%</div>
                <div class="small text-white-50">bunga flat / tahun</div>
              </div>
              <div class="col-4">
                <div class="fs-3 fw-bold">±2 hari</div>
                <div class="small text-white-50">proses persetujuan</div>
              </div>
              <div class="col-4">
                <div class="fs-3 fw-bold">60 bln</div>
                <div class="small text-white-50">tenor maksimal</div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="card shadow-lg" id="simulasi">
              <div class="card-body p-4">
                <h6 class="card-subtitle text-muted text-uppercase mb-3">Simulasi Cicilan</h6>

                <div class="mb-4">
                  <label for="tipeMobil" class="form-label fw-semibold">Tipe mobil</label>
                  <select class="form-select" id="tipeMobil">
                    <?php foreach ($carModels as $price => $name): ?>
                      <option value="<?php echo htmlspecialchars($price); ?>"><?php echo htmlspecialchars($name); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-4">
                  <label for="harga" class="form-label d-flex justify-content-between fw-semibold">
                    Harga mobil <span class="text-primary" id="hargaVal">Rp 250.000.000</span>
                  </label>
                  <input type="range" class="form-range" id="harga" min="80000000" max="1500000000" step="5000000" value="250000000" />
                </div>

                <div class="mb-4">
                  <label for="dp" class="form-label d-flex justify-content-between fw-semibold">
                    Uang muka (DP) <span class="text-primary" id="dpVal">20%</span>
                  </label>
                  <input type="range" class="form-range" id="dp" min="10" max="50" step="5" value="20" />
                </div>

                <div class="mb-3">
                  <label class="form-label fw-semibold d-block">Tenor cicilan</label>
                  <div class="btn-group w-100" role="group" id="tenorGroup">
                    <button type="button" class="btn btn-outline-dark" data-v="12">12 bln</button>
                    <button type="button" class="btn btn-outline-dark" data-v="24">24 bln</button>
                    <button type="button" class="btn btn-dark active" data-v="36">36 bln</button>
                    <button type="button" class="btn btn-outline-dark" data-v="48">48 bln</button>
                    <button type="button" class="btn btn-outline-dark" data-v="60">60 bln</button>
                  </div>
                </div>

                <div class="bg-light rounded p-3 mt-4">
                  <div class="small text-muted fw-semibold">Estimasi cicilan / bulan</div>
                  <div class="fs-2 fw-bold" id="cicilanOut">Rp 5.930.556</div>
                  <div class="small text-muted mb-1">Tipe mobil: <b id="tipeOut" class="text-dark">Custom</b></div>
                  <div class="row mt-2 gy-2 small">
                    <div class="col-6"><span class="text-muted d-block">Uang muka</span><b id="dpNominal">Rp 50.000.000</b></div>
                    <div class="col-6"><span class="text-muted d-block">Pokok pinjaman</span><b id="pokokOut">Rp 200.000.000</b></div>
                    <div class="col-6"><span class="text-muted d-block">Total bunga</span><b id="bungaOut">Rp 39.000.000</b></div>
                    <div class="col-6"><span class="text-muted d-block">Total pembayaran</span><b id="totalOut">Rp 239.000.000</b></div>
                  </div>
                </div>

                <div class="mt-4 pt-3 border-top">
                  <div class="d-flex justify-content-between small mb-1">
                    <span>Beban cicilan</span>
                    <span id="gaugeVerdict" class="badge text-bg-success">Ringan</span>
                  </div>
                  <div class="progress" role="progressbar" aria-label="Beban cicilan">
                    <div class="progress-bar bg-success" id="gaugeBar" style="width: 0%"></div>
                  </div>
                  <div class="form-text">dibanding harga mobil, per bulan</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="cara-kerja" class="py-5">
      <div class="container py-4">
        <div class="mb-5" style="max-width: 60ch">
          <p class="text-primary fw-semibold mb-2">Cara kerja</p>
          <h2 class="fw-bold mb-3">Tiga langkah, bukan tiga puluh</h2>
          <p class="text-muted mb-0">Dari simulasi sampai mobil terparkir di depan rumah, ini yang akan kamu lalui.</p>
        </div>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="fs-1 fw-bold text-primary mb-2">01</div>
                <h5 class="card-title">Simulasikan cicilan</h5>
                <p class="card-text text-muted">Atur harga mobil, uang muka, dan tenor di kalkulator sampai angkanya cocok dengan bujet bulananmu.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="fs-1 fw-bold text-primary mb-2">02</div>
                <h5 class="card-title">Ajukan & unggah dokumen</h5>
                <p class="card-text text-muted">Isi data diri dan unggah dokumen di bawah. Tim kami meninjau dan menghubungimu dalam 1–2 hari kerja.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="fs-1 fw-bold text-primary mb-2">03</div>
                <h5 class="card-title">Tanda tangan & terima mobil</h5>
                <p class="card-text text-muted">Setelah disetujui, tanda tangani kontrak di dealer rekanan terdekat dan mobil siap dibawa pulang.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-light border-top border-bottom">
      <div class="container py-4">
        <div class="mb-5" style="max-width: 60ch">
          <p class="text-primary fw-semibold mb-2">Kenapa simulcars</p>
          <h2 class="fw-bold mb-0">Dibuat untuk cicilan yang gak bikin was-was</h2>
        </div>
        <div class="row g-4">
          <div class="col-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h6 class="card-title fw-bold">Bunga flat, bukan efektif</h6>
                <p class="card-text small text-muted mb-0">Satu angka bunga dari awal sampai lunas — tidak berubah di tengah jalan.</p>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h6 class="card-title fw-bold">Tanpa biaya tersembunyi</h6>
                <p class="card-text small text-muted mb-0">Biaya admin dan asuransi ditampilkan di depan, sebelum kamu mengajukan.</p>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h6 class="card-title fw-bold">Tenor fleksibel</h6>
                <p class="card-text small text-muted mb-0">Pilih 12 sampai 60 bulan, sesuaikan dengan arus kas bulananmu sendiri.</p>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="card h-100">
              <div class="card-body">
                <h6 class="card-title fw-bold">Jaringan dealer luas</h6>
                <p class="card-text small text-muted mb-0">Bekerja sama dengan lebih dari 120 dealer mobil baru dan bekas di 18 kota.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="syarat" class="py-5">
      <div class="container py-4">
        <div class="mb-5" style="max-width: 60ch">
          <p class="text-primary fw-semibold mb-2">Syarat & dokumen</p>
          <h2 class="fw-bold mb-3">Siapkan ini sebelum mengajukan</h2>
          <p class="text-muted mb-0">Persyaratan berbeda tipis tergantung status pekerjaanmu.</p>
        </div>
        <div class="row g-5">
          <div class="col-md-6">
            <h5 class="fw-bold border-bottom pb-2 mb-3">Karyawan</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">✓ KTP & KK</li>
              <li class="list-group-item">✓ NPWP</li>
              <li class="list-group-item">✓ Slip gaji 3 bulan terakhir</li>
              <li class="list-group-item">✓ Rekening koran 3 bulan terakhir</li>
              <li class="list-group-item">✓ Surat keterangan kerja</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h5 class="fw-bold border-bottom pb-2 mb-3">Wiraswasta / profesional</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">✓ KTP & KK</li>
              <li class="list-group-item">✓ NPWP</li>
              <li class="list-group-item">✓ Rekening koran 6 bulan terakhir</li>
              <li class="list-group-item">✓ Legalitas usaha (SIUP/NIB)</li>
              <li class="list-group-item">✓ Laporan keuangan sederhana</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="kontak" class="py-5">
      <div class="container py-4">
        <div class="card bg-dark text-white p-4 p-md-5 border-0">
          <div class="row g-5 align-items-center">
            <div class="col-lg-6">
              <h2 class="fw-bold mb-3">Siap ajukan kredit mobilmu?</h2>
              <p class="text-white-50 mb-0">Tinggalkan datamu, tim kami akan menghubungi untuk memverifikasi dan lanjut ke tahap pengajuan.</p>
            </div>
            <div class="col-lg-6">
              <form id="ctaForm" class="d-grid gap-3">
                <input type="text" class="form-control" placeholder="Nama lengkap" required />
                <input type="tel" class="form-control" placeholder="Nomor HP / WhatsApp" required />
                <input type="text" class="form-control" placeholder="Mobil incaran (mis. Toyota Avanza)" />
                <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                <div class="text-success fw-semibold small" id="formMsg"></div>
                <div class="form-text text-white-50">Dengan mengirim form ini kamu setuju dihubungi tim simulcars terkait pengajuan kredit.</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="border-top py-4">
      <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div class="fw-bold">simulcars</div>
        <div class="d-flex gap-4 small">
          <a href="#simulasi" class="link-secondary text-decoration-none">Simulasi</a>
          <a href="#syarat" class="link-secondary text-decoration-none">Syarat</a>
          <a href="#kontak" class="link-secondary text-decoration-none">Kontak</a>
        </div>
        <div class="small text-muted">© <?php echo htmlspecialchars($currentYear); ?> simulcars. Ilustrasi, bukan penawaran resmi.</div>
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script>
      const rupiah = (n) => "Rp " + Math.round(n).toLocaleString("id-ID");

      const hargaInput = document.getElementById("harga");
      const dpInput = document.getElementById("dp");
      const tenorGroup = document.getElementById("tenorGroup");
      const tipeMobilSelect = document.getElementById("tipeMobil");
      let tenor = 36;
      const BUNGA_TAHUN = 6.5;

      function calc() {
        const harga = Number(hargaInput.value);
        const dpPct = Number(dpInput.value);

        document.getElementById("hargaVal").textContent = rupiah(harga);
        document.getElementById("dpVal").textContent = dpPct + "%";

        const dpNominal = (harga * dpPct) / 100;
        const pokok = harga - dpNominal;
        const tahun = tenor / 12;
        const bunga = pokok * (BUNGA_TAHUN / 100) * tahun;
        const total = pokok + bunga;
        const cicilan = total / tenor;

        document.getElementById("cicilanOut").textContent = rupiah(cicilan);
        document.getElementById("dpNominal").textContent = rupiah(dpNominal);
        document.getElementById("pokokOut").textContent = rupiah(pokok);
        document.getElementById("bungaOut").textContent = rupiah(bunga);
        document.getElementById("totalOut").textContent = rupiah(total);

        const tipeText = tipeMobilSelect.value ? tipeMobilSelect.options[tipeMobilSelect.selectedIndex].text : "Custom";
        document.getElementById("tipeOut").textContent = tipeText;

        // beban cicilan sebagai % harga mobil per bulan, dipetakan 0.8% - 3.2% -> 0-100%
        const ratio = (cicilan / harga) * 100;
        const clamped = Math.min(Math.max(ratio, 0.8), 3.2);
        const pct = ((clamped - 0.8) / (3.2 - 0.8)) * 100;

        const bar = document.getElementById("gaugeBar");
        const badge = document.getElementById("gaugeVerdict");
        bar.style.width = pct + "%";

        bar.classList.remove("bg-success", "bg-warning", "bg-danger");
        badge.classList.remove("text-bg-success", "text-bg-warning", "text-bg-danger");

        if (ratio < 1.6) {
          bar.classList.add("bg-success");
          badge.classList.add("text-bg-success");
          badge.textContent = "Ringan";
        } else if (ratio < 2.4) {
          bar.classList.add("bg-warning");
          badge.classList.add("text-bg-warning");
          badge.textContent = "Sedang";
        } else {
          bar.classList.add("bg-danger");
          badge.classList.add("text-bg-danger");
          badge.textContent = "Berat";
        }
      }

      hargaInput.addEventListener("input", calc);
      dpInput.addEventListener("input", calc);
      tipeMobilSelect.addEventListener("change", () => {
        if (tipeMobilSelect.value) {
          hargaInput.value = tipeMobilSelect.value;
        }
        calc();
      });
      tenorGroup.querySelectorAll("button").forEach((opt) => {
        opt.addEventListener("click", () => {
          tenorGroup.querySelectorAll("button").forEach((o) => {
            o.classList.remove("btn-dark", "active");
            o.classList.add("btn-outline-dark");
          });
          opt.classList.remove("btn-outline-dark");
          opt.classList.add("btn-dark", "active");
          tenor = Number(opt.dataset.v);
          calc();
        });
      });

      calc();

      document.getElementById("ctaForm").addEventListener("submit", function (e) {
        e.preventDefault();
        document.getElementById("formMsg").textContent = "Terima kasih, tim kami akan segera menghubungi Anda.";
        this.reset();
      });
    </script>
  </body>
</html>