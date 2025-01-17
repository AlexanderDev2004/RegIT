<!-- Navbar -->
<header class="w-full text-white flex items-center justify-between bg-[#132145] ">
    <section class="container w-fit flex pl-72 py-6 font-bold text-4xl cursor-default">
        <a href="dashboard">
        <h4 class="text-[#FEC01A]">Reg<span class="text-white">IT</span></h4>
        </a>
    </section>
    <section class="flex mr-14 items-center gap-4">
        <i class="fa-solid fa-circle-user text-4xl"></i>
        <div class="">
            <a href="profil">
            <h5><?= $_SESSION["name"] ?? "Session Expired"?></h5>
            <h5><?= $_SESSION["nim"] ?? "" ?></h5>
            </a>
        </div>
    </section>
</header>
<!-- Navbar End -->