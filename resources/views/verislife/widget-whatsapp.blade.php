<div class="whatsapp-btn">
    <a href="https://api.whatsapp.com/send?phone=+593969003039&text=Quiero%20saber%20m%C3%A1s%20de%20VerisCare" target="_blank" class="whatsapp-tooltip text-decoration-none d-none d-lg-block">chatear con vericita</a>
    <a href="https://api.whatsapp.com/send?phone=+593969003039&text=Quiero%20saber%20m%C3%A1s%20de%20VerisCare" target="_blank" class="whatsapp-icon bg-transparent" aria-label="Chat on WhatsApp">
        <img src="{{ request()->getHost() === '127.0.0.1' ? url('/') : secure_url('/') }}/assets/img/vericita-whatsapp.png" class="" width="90" alt="veris">
        <i class="fa-brands fa-whatsapp d-none"></i>
    </a>
</div>
<style>
.whatsapp-btn {
  position: fixed;
  bottom: 25px;
  right: 50px;
  z-index: 1000;
  display: flex;
  align-items: center;
}

.whatsapp-icon {
  /*background: #20b038;
  background: linear-gradient(
    0deg,
    rgba(32, 176, 56, 1) 0%,
    rgba(96, 214, 106, 1) 75%
  );*/
  width: 65px;
  height: 65px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: none;
  transition: all 0.3s ease;
  cursor: pointer;
  text-decoration: none;
}

.whatsapp-icon:hover {
  background-color: #128c7e;
  transform: scale(1.1);
}

.whatsapp-icon i {
  width: 35px;
  height: 35px;
  font-size: 30px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  color: #fff;
}

.whatsapp-tooltip {
  position: absolute;
  right: 72px;
  background: #20b038;
  background: linear-gradient(
    0deg,
    rgba(32, 176, 56, 1) 0%,
    rgba(96, 214, 106, 1) 75%
  );
  color: #fff !important;
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: 600;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  white-space: nowrap;
}

.whatsapp-btn:hover .whatsapp-tooltip {
  opacity: 1;
  visibility: visible;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateX(10px);
  }

  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.whatsapp-btn:hover .whatsapp-tooltip {
  animation: fadeIn 0.3s forwards;
}
</style>