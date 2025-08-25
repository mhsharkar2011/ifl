<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            BrandSeeder::class,
            UnitSeeder::class,
            ProductSeeder::class,
            // OrderSeeder::class,
            // OrderItemSeeder::class,
            // CartSeeder::class,
            // CartItemSeeder::class,
            // ShippingAddressSeeder::class,
            // PaymentSeeder::class,
            // ReviewSeeder::class,
            // WishlistSeeder::class,
            // WishlistItemSeeder::class,
            // CouponSeeder::class,
            // NotificationSeeder::class,
            // SettingSeeder::class,
            // ContactSeeder::class,
            // PageSeeder::class,
            // BlogSeeder::class,
            // BlogCategorySeeder::class,
            // BlogCommentSeeder::class,
            // RoleSeeder::class,
            // PermissionSeeder::class,
            // UserRoleSeeder::class,
            // UserPermissionSeeder::class,
            // ActivityLogSeeder::class,
            // AuditLogSeeder::class,
            // SocialAccountSeeder::class,
            // SubscriptionSeeder::class,
            // SubscriptionPlanSeeder::class,
            // TaxSeeder::class,
            // ShippingMethodSeeder::class,
            // LanguageSeeder::class,
            // CurrencySeeder::class,
            // BannerSeeder::class,
            // SliderSeeder::class,
            // FaqSeeder::class,
            // TestimonialSeeder::class,
            // PollSeeder::class,
            // PollOptionSeeder::class,
            // PollVoteSeeder::class,
            // SitemapSeeder::class,
            // CustomFieldSeeder::class,
            // CustomFieldValueSeeder::class,
            // CustomPageSeeder::class,
            // CustomPageContentSeeder::class,
            // CustomMenuSeeder::class,
            // CustomMenuItemSeeder::class,
            // CustomWidgetSeeder::class,
            // CustomWidgetContentSeeder::class,
            // CustomThemeSeeder::class,
            // CustomThemeSettingSeeder::class,
            // CustomThemeAssetSeeder::class,
        ]);
    }
}
