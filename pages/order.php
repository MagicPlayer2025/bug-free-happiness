<?php
require_once 'config.php';

// Инициализация фильтров и параметров поиска
$filters = [
    'flight' => $_REQUEST['flight'] ?? [],
    'hotel' => $_REQUEST['hotel'] ?? [],
    'food' => $_REQUEST['food'] ?? [],
    'transfer' => $_REQUEST['transfer'] ?? [],
    'insurance' => $_REQUEST['insurance'] ?? []
];

// Преобразование строк в массивы
foreach ($filters as &$filter) {
    if (!is_array($filter)) {
        $filter = $filter ? [$filter] : [];
    }
}
unset($filter);

// Параметры поиска
$searchParams = [
    'departure' => $_REQUEST['departure'] ?? '',
    'arrival' => $_REQUEST['arrival'] ?? '',
    'nights' => $_REQUEST['nights'] ?? '',
    'tourists' => $_REQUEST['tourists'] ?? '',
    'dateFrom' => $_REQUEST['dateFrom'] ?? '',
    'dateTo' => $_REQUEST['dateTo'] ?? '',
    'search' => isset($_REQUEST['search'])
];

// Загрузка туров
$tours = [];
if ($searchParams['search']) {
    try {
        $db = getDB();
        $sql = "SELECT * FROM tours WHERE 1=1";
        $params = [];
        
        // Добавляем условия поиска
        if (!empty($searchParams['departure'])) {
            $sql .= " AND departure_city LIKE :departure";
            $params[':departure'] = "%{$searchParams['departure']}%";
        }
        if (!empty($searchParams['arrival'])) {
            $sql .= " AND arrival_city LIKE :arrival";
            $params[':arrival'] = "%{$searchParams['arrival']}%";
        }
        if (!empty($searchParams['nights'])) {
            $sql .= " AND nights = :nights";
            $params[':nights'] = $searchParams['nights'];
        }
        
        // Добавляем фильтры
        if (!empty($filters['flight'])) {
            $placeholders = [];
            foreach ($filters['flight'] as $i => $value) {
                $param = ":flight_{$i}";
                $placeholders[] = $param;
                $params[$param] = $value;
            }
            $sql .= " AND flight_type IN (" . implode(',', $placeholders) . ")";
        }
        
        if (!empty($filters['hotel'])) {
            $placeholders = [];
            foreach ($filters['hotel'] as $i => $value) {
                $param = ":hotel_{$i}";
                $placeholders[] = $param;
                $params[$param] = (int)$value;
            }
            $sql .= " AND hotel_stars IN (" . implode(',', $placeholders) . ")";
        }
        
        if (!empty($filters['food'])) {
            $placeholders = [];
            foreach ($filters['food'] as $i => $value) {
                $param = ":food_{$i}";
                $placeholders[] = $param;
                $params[$param] = $value;
            }
            $sql .= " AND food_type IN (" . implode(',', $placeholders) . ")";
        }
        
        if (!empty($filters['transfer'])) {
            $transferValues = [];
            foreach ($filters['transfer'] as $value) {
                if ($value === 'yes') $transferValues[] = 1;
                if ($value === 'no') $transferValues[] = 0;
            }
            if (!empty($transferValues)) {
                $sql .= " AND has_transfer IN (" . implode(',', $transferValues) . ")";
            }
        }
        
        if (!empty($filters['insurance'])) {
            $insuranceValues = [];
            foreach ($filters['insurance'] as $value) {
                if ($value === 'yes') $insuranceValues[] = 1;
                if ($value === 'no') $insuranceValues[] = 0;
            }
            if (!empty($insuranceValues)) {
                $sql .= " AND has_insurance IN (" . implode(',', $insuranceValues) . ")";
            }
        }
        
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Ошибка при загрузке туров: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявка на тур</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once("../pages/template/header.php") ?>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Сайдбар с фильтрами -->
            <?php if ($searchParams['search']): ?>
                <div class="col-md-2 p-3 sidebar-tour">
                    <form method="GET" action="order.php" class="order_filters">
                        <input type="hidden" name="search" value="1">
                        <input type="hidden" name="departure" value="<?= htmlspecialchars($searchParams['departure']) ?>">
                        <input type="hidden" name="arrival" value="<?= htmlspecialchars($searchParams['arrival']) ?>">
                        <input type="hidden" name="nights" value="<?= htmlspecialchars($searchParams['nights']) ?>">
                        
                        <div class="order_filter-section">
                            <h3 class="text-center">Фильтры:</h3>
                            <h4 class="order_filter-heading">Перелёт:</h4>
                            <label class="order_filter-label">
                                <input type="checkbox" name="flight[]" value="direct" <?= in_array('direct', $filters['flight']) ? 'checked' : '' ?>> Прямой
                            </label>
                            <label class="order_filter-label">
                                <input type="checkbox" name="flight[]" value="transfer" <?= in_array('transfer', $filters['flight']) ? 'checked' : '' ?>> С пересадкой
                            </label>
                        </div>
                        
                        <div class="order_filter-section">
                            <h4 class="order_filter-heading">Отель:</h4>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <label class="order_filter-label">
                                    <input type="checkbox" name="hotel[]" value="<?= $i ?>" <?= in_array($i, $filters['hotel']) ? 'checked' : '' ?>> 
                                    <?= str_repeat('★', $i) ?>
                                </label>
                            <?php endfor; ?>
                        </div>
                        
                        <div class="order_filter-section">
                            <h4 class="order_filter-heading">Питание:</h4>
                            <label class="order_filter-label">
                                <input type="checkbox" name="food[]" value="Завтрак" <?= in_array('Завтрак', $filters['food']) ? 'checked' : '' ?>> Завтрак
                            </label>
                            <label class="order_filter-label">
                                <input type="checkbox" name="food[]" value="Завтрак+обед" <?= in_array('Завтрак+обед', $filters['food']) ? 'checked' : '' ?>> Завтрак + обед
                            </label>
                            <label class="order_filter-label">
                                <input type="checkbox" name="food[]" value="Завтрак+Ужин" <?= in_array('Завтрак+Ужин', $filters['food']) ? 'checked' : '' ?>> Завтрак + Ужин
                            </label>
                            <label class="order_filter-label">
                                <input type="checkbox" name="food[]" value="Всё включено" <?= in_array('Всё включено', $filters['food']) ? 'checked' : '' ?>> Всё включено
                            </label>
                        </div>
                        
                        <div class="order_filter-section">
                            <h4 class="order_filter-heading">Трансфер:</h4>
                            <label class="order_filter-label">
                                <input type="checkbox" name="transfer[]" value="yes" <?= in_array('yes', $filters['transfer']) ? 'checked' : '' ?>> С трансфером
                            </label>
                            <label class="order_filter-label">
                                <input type="checkbox" name="transfer[]" value="no" <?= in_array('no', $filters['transfer']) ? 'checked' : '' ?>> Без трансфера
                            </label>
                        </div>
                        
                        <div class="order_filter-section">
                            <h4 class="order_filter-heading">Страховка:</h4>
                            <label class="order_filter-label">
                                <input type="checkbox" name="insurance[]" value="yes" <?= in_array('yes', $filters['insurance']) ? 'checked' : '' ?>> Включена
                            </label>
                            <label class="order_filter-label">
                                <input type="checkbox" name="insurance[]" value="no" <?= in_array('no', $filters['insurance']) ? 'checked' : '' ?>> Нет
                            </label>
                        </div>
                        
                        <div class="order_filter-actions">
                            <button type="submit" class="order_filter-button">Применить фильтры</button>
                            <a href="order.php?search=1&departure=<?= urlencode($searchParams['departure']) ?>&arrival=<?= urlencode($searchParams['arrival']) ?>&nights=<?= urlencode($searchParams['nights']) ?>" class="reset-filters">Сбросить фильтры</a>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <!-- Основной контент -->
            <div class="<?= $searchParams['search'] ? 'col-md-10' : 'col-md-12' ?> p-3 content">
                <div class="header-block">
                    <h1>Заявка на тур</h1>
                    <p>Найдите тур по всему миру по выгодным ценам</p>
                </div>
                
                <div class="search-block">
                    <form method="GET" action="order.php">
                        <input type="hidden" name="search" value="1">
                        
                        <div class="input-row_order">
                            <div class="input-group_order">
                                <label for="departure">Город вылета</label>
                                <input type="text" id="departure" name="departure" placeholder="Откуда" required 
                                       value="<?= htmlspecialchars($searchParams['departure']) ?>">
                            </div>
                            <div class="input-group_order">
                                <label for="arrival">Город прилёта</label>
                                <input type="text" id="arrival" name="arrival" placeholder="Куда" required 
                                       value="<?= htmlspecialchars($searchParams['arrival']) ?>">
                            </div>
                        </div>
                        
                        <div class="input-row_order">
                            <div class="input-group_order">
                                <label for="nights">Кол-во ночей</label>
                                <input type="number" id="nights" name="nights" placeholder="Ночей" min="1" 
                                       value="<?= htmlspecialchars($searchParams['nights']) ?>">
                            </div>
                            <div class="input-group_order">
                                <label for="tourists">Кол-во туристов</label>
                                <input type="number" id="tourists" name="tourists" placeholder="Туристов" min="1" 
                                       value="<?= htmlspecialchars($searchParams['tourists']) ?>">
                            </div>
                        </div>
                        
                        <div class="input-row_order">
                            <div class="input-group_order">
                                <label for="dateFrom">Дата вылета</label>
                                <input type="date" id="dateFrom" name="dateFrom" required 
                                       value="<?= htmlspecialchars($searchParams['dateFrom']) ?>">
                            </div>
                            <div class="input-group_order">
                                <label for="dateTo">Обратно</label>
                                <input type="date" id="dateTo" name="dateTo" 
                                       value="<?= htmlspecialchars($searchParams['dateTo']) ?>">
                            </div>
                        </div>
                        
                        <div class="button-container">
                            <button type="submit" class="search-button">Поиск</button>
                        </div>
                    </form>
                </div>
                
                <?php if ($searchParams['search']): ?>
                    <div class="tours-list" id="toursList">
                        <?php if (empty($tours)): ?>
                            <p class="no-results">По вашему запросу туров не найдено.</p>
                        <?php else: ?>
                            <?php foreach ($tours as $tour): ?>
                                <div class="tour-card">
                                    <div class="tour-image">
                                        <img src="<?= htmlspecialchars($tour['image_url']) ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
                                    </div>
                                    <div class="tour-info">
                                        <h3><?= htmlspecialchars($tour['title']) ?></h3>
                                        <p><?= htmlspecialchars($tour['description']) ?></p>
                                        <p><strong>Ночей:</strong> <?= $tour['nights'] ?></p>
                                        <p><strong>Отель:</strong> <?= str_repeat('★', $tour['hotel_stars']) ?></p>
                                        <p><strong>Питание:</strong> <?= htmlspecialchars($tour['food_type']) ?></p>
                                        <p><strong>Трансфер:</strong> <?= $tour['has_transfer'] ? 'Да' : 'Нет' ?></p>
                                        <p><strong>Страховка:</strong> <?= $tour['has_insurance'] ? 'Включена' : 'Нет' ?></p>
                                    </div>
                                    <div class="tour-price">
                                        <div class="price"><?= number_format($tour['price'], 0, '', ' ') ?> ₽</div>
                                        <a class="book-button" href="<?= htmlspecialchars($tour['partner_url']) ?>">Забронировать</a>
                                        <img src="<?= htmlspecialchars($tour['img_operator']) ?>" style="width: 100%;">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php require_once ("../pages/template/footer.php") ?>
</body>
</html>