<?php

    class Productcard {
        private $data;

        public function __construct($data) {
            $this->data = $data;
        }

        public function render() {
            $ratingHtml = reviewStars($this->data['rating']);
            $html = '<div class="card">
                        <div>
                            <button class="card-icon" type="button">
                                <span class="dot"></span>' . $this->data['online'] . '
                            </button>
                        </div>
                        <div class="card-body">
                            <img class="game-img" src="' . $this->data['image_src'] . '" alt="' . $this->data['image_alt'] . '">
                            <h2 class="game-name" style="color: black; text-transform: capitalize;">' . trimText($this->data['product_name'], 20) . '</h2>
                            <div class="rating">
                                '.
                                    $ratingHtml
                                .'
                            </div>
                            <ul class="d-flex game-info-group">
                                <li class="game-info">' . $this->data['players'] . '</li>
                                <li class="game-info">' . $this->data['genre'] . '</li>
                                <li class="game-info">' . $this->data['brand'] . '</li>
                            </ul>
                            <p class="game-release-info">Released ' . $this->data['release_date'] . '</p>
                        </div>

                        <div class="card-last-footer">
                            <span class="game-release-info">' . $this->data['price'] . '</span>
                            <button class="card-btn" type="button">' . $this->data['button_text'] . '</button>
                        </div>
                    </div>
                    ';

            return $html;
        }
    }
?>
