<?php

use Illuminate\Database\Seeder;

use App\Models\News;

class NewsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::insert(
            [
                'header_news' => 'BÁN VÉ XE TẾT NGUYÊN ĐÁN 2020 - TẾT CANH TÝ',
                'content_short' => null,
                'content_full' => '<p style="text-align:center"><span style="font-size:20px"><span style="color:#FF0000">V&Eacute; XE TẾT NGUY&Ecirc;N Đ&Aacute;N 2020 - GI&Aacute; RẺ BẤT NGỜ</span></span></p>
    
                    <p style="text-align:center"><span style="font-size:20px"><span style="color:#FF0000">Tuyến Đường Hồ Ch&iacute; Minh - Đ&agrave; Nẵng</span></span></p>
                    
                    <p style="text-align:center"><span style="font-size:20px"><span style="color:#FF0000">Gi&aacute; V&eacute; linh động t&ugrave;y&nbsp;thuộc v&agrave;o Điểm Đến</span></span></p>
                    
                    <p style="text-align:center">&nbsp;</p>
                    
                    <p><span style="font-size:20px">Điểm Đến: Kh&aacute;nh H&ograve;a; Ph&uacute; Y&ecirc;n; B&igrave;nh Định; Qu&atilde;ng Ng&atilde;i; Qu&atilde;ng Nam; Đ&agrave; Nẵng</span></p>
                    
                    <p>&nbsp;</p>
                    
                    <p><span style="font-size:20px">Thời gian: C&aacute;c ng&agrave;y 22 - 24 - 26 - 28 Th&aacute;ng Chạp &Acirc;m Lịch</span></p>
                    
                    <p><span style="font-size:20px">Li&ecirc;n hệ Hotline Đặt V&eacute;:</span></p>
                    
                    <p><span style="font-size:20px">Hiếu Ngọc Travel</span></p>
                    
                    <p><span style="font-size:20px">Điện thoại: 0916 780 660 (Mr. Ninh)</span></p>
                    
                    <p>&nbsp;</p>',
                'news_images' => '',
                'status' => 1,
            ]);
    
            News::insert(
            [
                'header_news' => 'Muốn không bị mất cắp khi đi du lịch hãy bỏ túi ngay những bí kíp này',
                'content_short' => null,
                'content_full' => '<p>Video: vnexpress</p>
    
                <p><a href="https://youtu.be/roDQTP380pU">https://youtu.be/roDQTP380pU</a></p>
                
                <p><br />
                🧨&nbsp;Bị mất cắp khi đi du lịch l&agrave; t&igrave;nh trạng chẳng phải xa lạ với bất cứ t&iacute;n dồ m&ecirc; x&ecirc; dịch n&agrave;o. Tuy nhi&ecirc;n kh&ocirc;ng phải ai cũng biết c&aacute;ch ph&ograve;ng chống t&igrave;nh trạng n&agrave;y.&nbsp;<br />
                <br />
                ⚠&nbsp;Dưới đ&acirc;y l&agrave; video sẽ l&agrave; những b&iacute; k&iacute;p hiệu quả gi&uacute;p bạn hạn chế tối đa t&igrave;nh trạng bị mất cắp khi đi du lịch để c&oacute; những chuyến đi thật trọn vẹn.<br />
                <br />
                ----------------------------<br />',
                'news_images' => '',
                'status' => 1,
            ]);
    
            News::insert(
            [
                'header_news' => 'THUÊ XE 16C TRONG NỘI THÀNH TPHCM',
                'content_short' => 'Nếu như dòng xe 7 chỗ  dành cho khách hàng có nhu cầu đi công tác, đi làm việc trong nội thành, thì dòng xe 16 chỗ thường dành cho những khách hàng muốn đi du lịch thư giãn vào dịp cuối tuần. Hiện tại, trên thị trường có 2 dòng xe 16C phổ biến là: Mers Sprinter (hay còn gọi là Mers vuông) và Ford Transit.',
                'content_full' => '<strong>Dòng xe Ford Transit:</strong></span></p>
                    <p style="text-align: center; line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"> </p>
                    <p style="text-align: center; line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><img src="/images/stories/bai-viet/my-linh/bai-7/kinh-nghiem-lai-xe-tai-can-tho3.jpg" border="0" alt="alt" /></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"> </p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Dòng xe Ford Transit có ưu điểm hơn Mers Sprinter ở chỗ ghế nội thất được thiết kế ngã ra sau nhiều hơn. Khách hàng ngồi trên xe cảm thấy thoái mải hơn.</span></p>
                    <p style="text-align: justify;"> </p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Quý khách có thể tham khảo bảng giá xe bên dưới:</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- Trong nội thành TPHCM: giới hạn 100km/10h giá 1tr6.</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Địa đạo Củ Chi: 1tr6</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Cần Giờ: 1tr8</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Cái Bè: 2tr</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Vũng Tàu: 2tr2</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">⇒ Giá xe trên chưa bao gồm thuế VAT (nếu có), và phí đậu xe.</span></p>
                    <p><br /><br /></p>
                    <h2 style="line-height: 1.8; margin-top: 18pt; margin-bottom: 6pt; text-align: justify;" dir="ltr"><span style="font-size: 16pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Một vài lưu ý khi đặt xe 16 chỗ đi du lịch</span></h2>
                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="color: #000000; vertical-align: baseline; white-space: pre-wrap;"><span style="font-size: medium;">* Giá xe 16C đi vào ngày cuối tuần thường cao hơn ngày làm việc trong tuần 200-300k nhé</span></span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">* Thuexegiare.net chỉ đón 1-2 điểm trong nội thành TPHCM (sẽ phụ thu nếu đón tại Bình Chánh, Hóc Môn, Nhà Bè, Thủ Đức…)</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">* Đặt cọc trước 30% bằng hình thức tiền mặt/ chuyển khoản vào các ngày cuối tuần.</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">* Thanh toán hết phần tiền còn lại khi kết thúc lộ trình.</span></p>
                    <p> </p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;"><strong>CÔNG TY CỔ PHẦN THƯƠNG MẠI VÀ ĐÀO TẠO TIN HỌC LONG THÀNH</strong></span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">286/17A, Phạm Văn Bạch, Phường 15, Quận Tân Bình, TP.HCM</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Hotline: 0902.202.202 hoặc (028) 2202.2202</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Website: thuexegiare.net</span></p>',
                'news_images' => 'kinh-nghiem-lai-xe-tai-can-tho3.jpg',
                'status' => 1,
            ]);
    
            News::insert(
            [
                'header_news' => 'THUÊ XE 7C ĐI TRONG NỘI THÀNH TP HCM',
                'content_short' => 'Không giống như dòng xe 7 chỗ khác như taxi Vinasun, Mai Linh với kiểu xe Innova dòng cũ dán decal đặc trưng, chạy theo giờ. Thuê xe du lịch 7 chỗ TPHCM của thuexegiare.net được đầu tư chuyên nghiệp hơn với các dòng xe mới Innova 2013-2016, Fortuner 2013-2016 với tài xế chuyên nghiệp, phong cách lịch sự, nhã nhặn. Thuê xe du lịch 7 chỗ của chúng tôi bạn sẽ cảm nhận đây như là chiếc xe của nhà mình vậy.',
                'content_full' => '<p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; font-weight: 700; vertical-align: baseline; white-space: pre-wrap;"> Dòng xe 7 chỗ Fortuner</span><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;"> </span></p>
                    <p style="text-align: center; line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><img src="/images/stories/bai-viet/truc-thi/bai-viet6/thue-xe-di-trong-noi-thanh-tphcm-.jpg" border="0" alt="alt" /></p>
                    <p style="text-align: center; line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: medium;">Xe Fortuner mạnh mẽ thách thức mọi cung đường</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"> </p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">được thiết kế mạnh mẽ, đẳng cấp. Hai dòng xe này chinh phục rất nhiều khách hàng Việt Nam, Hàn Quốc, Nhật Bản, rất phù hợp với việc đưa đón nhân viên đi công tác, đi thị trường, hoặc các gia đình đi chơi vào dịp cuối tuần.</span></p>
                    <p style="text-align: justify;"> </p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Các bạn thử tham khảo </span><span style="font-size: 12pt; font-family: Arial; color: #000000; font-style: italic; vertical-align: baseline; white-space: pre-wrap; text-decoration: underline;">bảng giá thuê xe 7 chỗ TPHCM </span><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">đi trong TP HCM và các tỉnh lân cận:</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- Trong nội thành TPHCM: giới hạn 100km/10h giá 1tr4</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Địa đạo Củ Chi: 1tr2</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Cần Giờ: 1tr4</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Cái Bè: 1tr6</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">- HCM đi Vũng Tàu: 1tr7</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">⇒ Giá xe trên chưa bao gồm thuế VAT (nếu có), và phí đậu xe.</span></p>
                    <p> </p>
                    <h2 style="line-height: 1.7999999999999998; margin-top: 18pt; margin-bottom: 6pt;" dir="ltr"><span style="font-size: 16pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Một vài lưu ý khi đặt xe 7 chỗ đi du lịch của chúng tôi</span></h2>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">* Thuexegiare.net chỉ đón 1-2 điểm trong nội thành TPHCM (sẽ phụ thu nếu đón tại Bình Chánh, Hóc Môn, Nhà Bè, Thủ Đức…)</span></p>
                    <p style="line-height: 1.8; margin-top: 0pt; margin-bottom: 0pt; text-align: justify;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">* Đặt cọc trước 30% bằng hình thức tiền mặt/ chuyển khoản vào các ngày cuối tuần.</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">* Thanh toán hết phần tiền còn lại khi kết thúc lộ trình.</span></p>
                    <p> </p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;"><strong>CÔNG TY CỔ PHẦN THƯƠNG MẠI VÀ ĐÀO TẠO TIN HỌC LONG THÀNH</strong></span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">286/17A, Phạm Văn Bạch, Phường 15, Quận Tân Bình, TP.HCM</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Hotline: 0902.202.202 hoặc (028) 2202.2202</span></p>
                    <p style="line-height: 1.7999999999999998; margin-top: 0pt; margin-bottom: 0pt;" dir="ltr"><span style="font-size: 12pt; font-family: Arial; color: #000000; vertical-align: baseline; white-space: pre-wrap;">Website: thuexegiare.net</span></p>',
                'news_images' => 'thue-xe-di-trong-noi-thanh-tphcm.jpg',
                'status' => 1,
            ]);
    }
}
