<aside class="main-sidebar sidebar-primary-green elevation-4 text-light" style="background-color: #0F3460;" >
  <!-- Brand Logo -->
  <style>
    p {
	color: #000000;
}
  </style>
  <a href="index3.html" class="brand-link">
    <img src="{{asset('assets/dist/img/logostfi.png')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light text-light" >𝐒𝐓𝐅𝐈 || 𝐒𝐀𝐑𝐏𝐑𝐀𝐒</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('assets/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
          <h5>{{Auth::user()->name}}</h5>
      </div>
    </div>

    
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('inventaris.index') }}" class="nav-link active" style="background-color: #839AA8">
            <img src="{{asset('assets/dist/img/invenn.png')}}" width="35px" alt="">
            <p>
             Inventaris
            </p>
          </a>
        </li>

        {{-- <!-- DROPDOWN FURNITURE -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active" style="background-color: #839AA8">
            <img src="{{asset('assets/dist/img/furniture.png')}}" width="35px" alt="">
             <p>
               Furniture
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
        </li>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('ac.index') }}" class="nav-link active" style="background-color: #839AA8">
              <img src="{{asset('assets/dist/img/ac.png')}}" width="35px" alt="">
              <p>AC</p>
            </a>
          </li>
        </ul> --}}
        
        <!-- DROPDOWN NAMA BARANG DAN ALAT -->
        <li class="nav-item menu-open" >
          <a href="#" class="nav-link active" style="background-color: #839AA8">
           <img src="{{asset('assets/dist/img/inven.png')}}" width="35px" alt="">
            <p>
              Nama Barang &  Alat
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('ac.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/ac.png')}}" width="35px" alt="">
                <p>AC</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('alatAbsensi.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/fingerprint.png')}}" width="35px" alt="">
                <p>Alat Absensi Finger Print</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('anycast.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/anycast.png')}}" width="35px" alt="">
                <p>Any Cast</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('akrilik.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/akrilik.png')}}" width="35px" alt="">
                <p>Akrilik</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('alatCuciTangan.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/hand-wash.png')}}" width="35px" alt="">
                <p>Alat Cuci Tangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('busa.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/busa.png')}}" width="35px" alt="">
                <p>Busa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('baterai.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/battery.png')}}" width="35px" alt="">
                <p>Batrai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('backdrop.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/backdrop.png')}}" width="35px" alt="">
                <p>Backdrop</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('backwoool.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/backwool.png')}}" width="35px" alt="">
                <p>Back Wool</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('blower.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/air-blower.png')}}" width="35px" alt="">
                <p>Blower</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('boxpvs.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/boxpvc.png')}}" width="35px" alt="">
                <p>Box PVC 15 In STX 15 A</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cctv.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/cctv.png')}}" width="35px" alt="">
                <p>CCTV</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cpu.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/cpu.png')}}" width="35px" alt="">
                <p>CPU</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cowayheva.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/heva.png')}}" width="35px" alt="">
                <p>Coway HEVA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cermin.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/mirror.png')}}" width="35px" alt="">
                <p>Cermin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ceksuhu.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/thermometers.png')}}" width="35px" alt="">
                <p>Cek Suhu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('container.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/container.png')}}" width="35px" alt="">
                <p>Container</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('camera.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/cam.png')}}" width="35px" alt="">
                <p>Camera</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('charger.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/charger.png')}}" width="35px" alt="">
                <p>Charger</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('drawertroley.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/trolley.png')}}" width="35px" alt="">
                <p>Drawer Troley 3 Layers (troli makanan)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('destopswitch.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/ethernet.png')}}" width="35px" alt="">
                <p>Destop Switch 16 Poin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('dispenser.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/dispenser.png')}}" width="35px" alt="">
                <p>Dispenser</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('exhausetcosmose.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/exha.png')}}" width="35px" alt="">
                <p>Exhauset Cosmos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('extensen.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/term.png')}}" width="35px" alt="">
                <p>Extensen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('filingcabinet.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/cabinet.png')}}" width="35px" alt="">
                <p>Filing Cabinet</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('foldable.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/hnd.png')}}" width="35px" alt="">
                <p>Foldable Handtruck (Troli Barang)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('figura.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/fg.png')}}" width="35px" alt="">
                <p>Figura Visi & Misi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('godox.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/godox.png')}}" width="35px" alt="">
                <p>Godox</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ht.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/wk.png')}}" width="35px" alt="">
                <p>HT</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('headsetgaming.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/headsetg.png')}}" width="35px" alt="">
                <p>Headset Gaming</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('hdmi.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/hdmi.png')}}" width="35px" alt="">
                <p>HDMI</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jamdinding.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/jamdinding.png')}}" width="35px" alt="">
                <p>Jam Dinding</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jetpam.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/jet.png')}}" width="35px" alt="">
                <p>Jet Pam</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jackcanon.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/jack.png')}}" width="35px" alt="">
                <p>Jack Canon NT Hitam (Orange)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('karpet.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/carpet.png')}}" width="35px" alt="">
                <p>Karpet</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kipas.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/kipas.png')}}" width="35px" alt="">
                <p>Kipas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kursi.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/chair.png')}}" width="35px" alt="">
                <p>Kursi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('komputer.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/comp.png')}}" width="35px" alt="">
                <p>Komputer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('kotakkayu.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/key.png')}}" width="35px" alt="">
                <p>Kotak Kayu Tempat Kunci</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lampu.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/lamp.png')}}" width="35px" alt="">
                <p>Lampu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('laptop.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/laptop.png')}}" width="35px" alt="">
                <p>Laptop</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('lemari.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/lem.png')}}" width="35px" alt="">
                <p>Lemari</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('layarinfocus.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/ly.png')}}" width="35px" alt="">
                <p>Layar Infocus</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('meja.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/tb.png')}}" width="35px" alt="">
                <p>Meja</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('mesin.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/mc.png')}}" width="35px" alt="">
                <p>Mesin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('mobil.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/car.png')}}" width="35px" alt="">
                <p>Mobil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('mic.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/mic.png')}}" width="35px" alt="">
                <p>Mic</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('mixer.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/audi.png')}}" width="35px" alt="">
                <p>Mixer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('microtick.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/router.png')}}" width="35px" alt="">
                <p>Microtick</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('monitor.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/moni.png')}}" width="35px" alt="">
                <p>Monitor</p>
              </a>
            </li><li class="nav-item">
              <a href="{{ route('payung.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/um.png')}}" width="35px" alt="">
                <p>Payung</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('papantulis.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/wb.png')}}" width="35px" alt="">
                <p>Papan Tulis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('penghancurkertas.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/pk.png')}}" width="35px" alt="">
                <p>Penghancur Kertas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pabx.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/pabx.png')}}" width="35px" alt="">
                <p>PABX</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('projector.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/p.png')}}" width="35px" alt="">
                <p>Projector</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('printer.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/ter.png')}}" width="35px" alt="">
                <p>Printer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('rak.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/rak.png')}}" width="35px" alt="">
                <p>Rak</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ranjangpasien.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/pasien.png')}}" width="35px" alt="">
                <p>Ranjang Pasien</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('showcase.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/case.png')}}" width="35px" alt="">
                <p>Show Case</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('standtv.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/st.png')}}" width="35px" alt="">
                <p>Stand TV</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('selector.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/sw.png')}}" width="35px" alt="">
                <p>Selector</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('scanner.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/scan.png')}}" width="35px" alt="">
                <p>Scanner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('skat.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/skat.png')}}" width="35px" alt="">
                <p>Skat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('sofa.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/sofa.png')}}" width="35px" alt="">
                <p>Sofa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('socket.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/soc.png')}}" width="35px" alt="">
                <p>Socket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('scandisk.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/card.png')}}" width="35px" alt="">
                <p>Scandisk Extrem</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tablet.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/tab.png')}}" width="35px" alt="">
                <p>Tablet</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tabungpemadam.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/tabung.png')}}" width="35px" alt="">
                <p>Tabung Pemadam</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tangga.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/tangga.png')}}" width="35px" alt="">
                <p>Tangga</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('telephone.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/telephone.png')}}" width="35px" alt="">
                <p>Telephone</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('terminalkabel.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/terminal.png')}}" width="35px" alt="">
                <p>Terminal Kabel</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tiangtongkat.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/t.png')}}" width="35px" alt="">
                <p>Tiang & Tongkat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('toa.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/toa.png')}}" width="35px" alt="">
                <p>Toa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('torent.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/tower.png')}}" width="35px" alt="">
                <p>Torent</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tv.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/tv.png')}}" width="35px" alt="">
                <p>TV</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tas.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/tas.png')}}" width="35px" alt="">
                <p>Tas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('tripod.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/trip.png')}}" width="35px" alt="">
                <p>Tripod</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ups.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/ups.png')}}" width="35px" alt="">
                <p>UPS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('webcam.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/webcam.png')}}" width="35px" alt="">
                <p>Web Cam</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('wireless.index') }}" class="nav-link active" style="background-color: #839AA8">
                <img src="{{asset('assets/dist/img/w.png')}}" width="35px" alt="">
                <p>Wireless Hitam</p>
              </a>
            </li>
          </ul>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>