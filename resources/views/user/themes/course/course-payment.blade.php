@extends('user.layouts.home')
@section('content')
<div id="wrapper" class="wrapper">
    <div class="container">
        <div class="pages-template">
            <section class="page-content">
                <div class="entry-content">
                    <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>
                        <form class="woocommerce-cart-form" action="https://titv.vn/gio-hang/" method="post">
                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-remove"><span class="screen-reader-text">Xóa sản
                                                phẩm</span></th>
                                        <th class="product-thumbnail"><span class="screen-reader-text">Hình ảnh
                                                thu nhỏ</span></th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                        <td class="product-remove">
                                            <a href="https://titv.vn/gio-hang/?remove_item=0f93a8c8ca13fb9ff35e12e2b642260e&#038;_wpnonce=66595ac132"
                                                class="remove"
                                                aria-label="Xóa [Video] Lập trình viên Java Web Fullstack: React kết hợp Spring Boot khỏi giỏ hàng"
                                                data-product_id="52747" data-product_sku="">&times;</a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <img decoding="async" width="300" height="152"
                                                src="https://titv.vn/wp-content/uploads/2023/07/lap-trinh-c-300-×-152-px.png"
                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                alt="" />
                                        </td>
                                        <td class="product-name" data-title="Sản phẩm">
                                            [Video] Lập trình viên Java Web Fullstack: React kết hợp Spring
                                            Boot&nbsp; </td>
                                        <td class="product-price" data-title="Giá">
                                            <span class="woocommerce-Price-amount amount"><bdi>399,000<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span>
                                        </td>
                                        <td class="product-quantity" data-title="Số lượng">
                                            <div class="quantity">
                                                <label class="screen-reader-text" for="quantity_67c879744e86a">[Video]
                                                    Lập trình viên Java Web
                                                    Fullstack: React kết hợp Spring Boot số lượng</label>
                                                <input type="hidden" id="quantity_67c879744e86a"
                                                    class="input-text qty text"
                                                    name="cart[0f93a8c8ca13fb9ff35e12e2b642260e][qty]" value="1"
                                                    aria-label="Số lượng sản phẩm" min="1" max="1"
                                                    step="1" placeholder="" inputmode="numeric"
                                                    autocomplete="off" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Tạm tính">
                                            <span class="woocommerce-Price-amount amount"><bdi>399,000<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <div class="coupon">
                                                <label for="coupon_code" class="screen-reader-text">Ưu
                                                    đãi:</label> <input type="text" name="coupon_code"
                                                    class="input-text" id="coupon_code" value=""
                                                    placeholder="Mã ưu đãi" /> <button type="submit" class="button"
                                                    name="apply_coupon" value="Áp dụng">Áp
                                                    dụng</button>
                                            </div>
                                            <button type="submit" class="button" name="update_cart"
                                                value="Cập nhật giỏ hàng">Cập nhật giỏ hàng</button>
                                            <input type="hidden" id="woocommerce-cart-nonce"
                                                name="woocommerce-cart-nonce" value="66595ac132" /><input type="hidden"
                                                name="_wp_http_referer" value="/gio-hang/" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Tổng cộng giỏ hàng</h2>
                                <table cellspacing="0" class="shop_table shop_table_responsive">
                                    <tr class="cart-subtotal">
                                        <th>Tạm tính</th>
                                        <td data-title="Tạm tính"><span
                                                class="woocommerce-Price-amount amount"><bdi>399,000<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng</th>
                                        <td data-title="Tổng"><strong><span
                                                    class="woocommerce-Price-amount amount"><bdi>399,000<span
                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></strong>
                                        </td>
                                    </tr>
                                </table>
                                <div class="wc-proceed-to-checkout">

                                    <a href="https://titv.vn/thanh-toan/"
                                        class="checkout-button button alt wc-forward">
                                        Tiến hành thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection