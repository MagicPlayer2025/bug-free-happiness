<?php require_once ("template/header.php") ?>
<div class="content">
  <div class="contact-page">
    <h1>КОНТАКТЫ</h1>
    <?php if (isset($_GET['status'])): ?>
      <?php if ($_GET['status'] == 'success'): ?>
        <p style="color: green; text-align: center;">Ваше сообщение успешно отправлено!</p>
      <?php elseif ($_GET['status'] == 'error'): ?>
        <p style="color: red; text-align: center;">Ошибка при отправке: <?php echo htmlspecialchars($_GET['message']); ?></p>
      <?php endif; ?>
    <?php endif; ?>
    <div class="contact-info-container">
      <div class="contact-details">
        <div class="contact-item">
          <i class="fas fa-phone-alt"></i>
          <span>+7 900 000-00-00</span>
        </div>
        <div class="contact-item">
          <i class="fas fa-envelope"></i>
          <span>info@turput.ru</span>
        </div>
        <div class="contact-item">
          <i class="fas fa-map-marker-alt"></i>
          <span>Ижевск Ул. Комунаров, д. 367</span>
        </div>
        <div class="contact-item social-links">
          <i class="fas fa-wifi"></i>
          <span>Наши соцсети</span>
          <a href="#"><img src="../assets/img/vk-icon.png" alt="VK"></a>
          <a href="#"><img src="../assets/img/telegram-icon.png" alt="Telegram"></a>
        </div>
      </div>
      <div class="map-placeholder">
        <div class="contact_map" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/44/izhevsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ижевск</a><a href="https://yandex.ru/maps/44/izhevsk/house/ulitsa_kommunarov_367/YUoYdAZlSkEDQFtsfXR3dHRnYQ==/?indoorLevel=1&ll=53.215344%2C56.865845&utm_medium=mapframe&utm_source=maps&z=16.96" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Коммунаров, 367 — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?indoorLevel=1&ll=53.215344%2C56.865845&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgoxNTYwNTkyMzYwEmvQoNC-0YHRgdC40Y8sINCj0LTQvNGD0YDRgtGB0LrQsNGPINCg0LXRgdC_0YPQsdC70LjQutCwLCDQmNC20LXQstGB0LosINGD0LvQuNGG0LAg0JrQvtC80LzRg9C90LDRgNC-0LIsIDM2NyIKDYLcVEIVoHZjQg%2C%2C&z=16.96" width="800" height="600" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
      </div>
    </div>
    <div class="contact-form-container">
      <form class="contact-form" action="../process_contact_form.php" method="POST">
        <div class="form-group">
          <label for="phone">Телефон</label>
          <input type="text" id="phone" name="phone">
        </div>
        <div class="form-group">
          <label for="message">Сообщение</label>
          <textarea id="message" name="message"></textarea>
        </div>
        <button type="submit" class="submit-button">Отправить</button>
      </form>
    </div>
  </div>
</div>
  <?php require_once ("template/footer.php") ?>