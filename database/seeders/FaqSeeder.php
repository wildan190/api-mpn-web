<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'title' => 'Apakah solusi yang ditawarkan cocok untuk perusahaan berskala besar?',
                'category' => 'Skalabilitas',
                'description' => 'Ya, solusi kami dirancang untuk enterprise-level dengan kemampuan skalabilitas tinggi yang mendukung ekspansi dan kebutuhan jangka panjang.',
            ],
            [
                'title' => 'Apa keunggulan AI yang ditawarkan oleh Micro Padma Nusantara?',
                'category' => 'Kecerdasan Buatan (AI)',
                'description' => 'Kami membangun sistem AI berbasis data yang dapat membantu automasi, prediksi, dan pengambilan keputusan secara cerdas dan cepat.',
            ],
            [
                'title' => 'Apakah Micro Padma Nusantara mendukung pengembangan sistem IoT?',
                'category' => 'IoT',
                'description' => 'Tentu, kami merancang dan mengimplementasikan solusi IoT mulai dari sensor hingga integrasi sistem cloud yang andal dan aman.',
            ],
            [
                'title' => 'Bagaimana proses kemitraan dengan Micro Padma Nusantara?',
                'category' => 'Kemitraan',
                'description' => 'Kami membangun kemitraan jangka panjang dengan pendekatan kolaboratif, transparan, dan berbasis kepercayaan serta keberhasilan bersama.',
            ],
            [
                'title' => 'Bisakah solusi kami disesuaikan dengan kebutuhan industri tertentu?',
                'category' => 'Kustomisasi',
                'description' => 'Ya, kami menyediakan solusi yang dapat disesuaikan dengan kebutuhan spesifik industri seperti manufaktur, energi, logistik, dan lainnya.',
            ],
            [
                'title' => 'Apakah layanan Anda mendukung keberlanjutan dan inovasi jangka panjang?',
                'category' => 'Inovasi',
                'description' => 'Kami mendorong inovasi berkelanjutan melalui riset, pengembangan teknologi terbaru, dan pemantauan performa solusi yang terus-menerus.',
            ],
            [
                'title' => 'Apakah Anda menyediakan dukungan teknis dan pemeliharaan setelah implementasi?',
                'category' => 'Support',
                'description' => 'Tentu, kami menyediakan layanan support dan maintenance secara proaktif untuk memastikan sistem berjalan optimal dan minim downtime.',
            ],
            [
                'title' => 'Berapa lama waktu implementasi rata-rata untuk solusi enterprise?',
                'category' => 'Implementasi',
                'description' => 'Waktu implementasi bervariasi tergantung kompleksitas proyek, namun rata-rata berkisar antara 1 hingga 3 bulan termasuk tahap analisis dan uji coba.',
            ],
        ];

        Faq::insert($faqs);
    }
}
