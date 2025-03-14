# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

Generated by [`auto-changelog`](https://github.com/CookPete/auto-changelog).

## [Unreleased](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.14...HEAD)

### Commits

- feat: add IBM Plex Sans font to Vite configuration [`3a39406`](https://github.com/Pricism/ictc-event-management-system/commit/3a39406bfe110596206aa71237b388e340756dd3)

## [v1.3.13](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.12...v1.3.13) - 2025-03-06

### Commits

- feat: add help section to event model with title and description fields [`ca08d6a`](https://github.com/Pricism/ictc-event-management-system/commit/ca08d6a5951d1c840f323083c42207184dedb8c4)
- feat: add date range description method to EventModel and update views to utilize it [`a445d05`](https://github.com/Pricism/ictc-event-management-system/commit/a445d0500b22ec025de60a7702b3845e9b1fd8aa)

## [v1.3.12](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.11...v1.3.12) - 2025-03-05

### Commits

- feat: enhance user import functionality to update existing users and profiles [`967952c`](https://github.com/Pricism/ictc-event-management-system/commit/967952c93daa34aed38e5d88d96ab071706fa4c3)

## [v1.3.11](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.10...v1.3.11) - 2025-03-03

### Commits

- feat: add role management and seeding functionality; update user role assignment and navigation permissions [`de40ccf`](https://github.com/Pricism/ictc-event-management-system/commit/de40ccf1d8bb7e14d3e0cf947c262d3977a8fab3)

## [v1.3.10](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.9...v1.3.10) - 2025-02-27

### Commits

- refactor: simplify slider indicators in user login view [`1223352`](https://github.com/Pricism/ictc-event-management-system/commit/12233527ebcea1e99ae7cd8ca25c8b2edfd0e5a1)

## [v1.3.9](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.8...v1.3.9) - 2025-02-23

### Commits

- feat: implement TicketsList component and update booking views; modify invoice generation logic [`d73c2aa`](https://github.com/Pricism/ictc-event-management-system/commit/d73c2aa6f661974ba2d58ec602799a6134473962)

## [v1.3.8](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.7...v1.3.8) - 2025-02-23

### Commits

- feat: add middleware_bill_data field and QR code generation to PaymentOrder model; update request validation rules and add participation certificate view [`c055c10`](https://github.com/Pricism/ictc-event-management-system/commit/c055c102713b75e327a35f0dad61914a4bde902d)
- fix: ensure middleware_bill_data is initialized as an empty array if not provided [`c5c0aca`](https://github.com/Pricism/ictc-event-management-system/commit/c5c0aca79e9037eb4e8c3053e9ab45c368d1490c)

## [v1.3.7](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.6...v1.3.7) - 2025-02-23

### Commits

- fix: streamline release script for tag generation and changelog update [`1eb9d07`](https://github.com/Pricism/ictc-event-management-system/commit/1eb9d07c72cdd71f8aff99dd5b12197e09d0c298)
- fix: update release script to push tags after committing changes [`907b63b`](https://github.com/Pricism/ictc-event-management-system/commit/907b63b00cd0a533633d432ba44558bca52a9c6f)
- fix: update release script to push all branches after changelog update [`faf24fb`](https://github.com/Pricism/ictc-event-management-system/commit/faf24fbfbdb51efd4bf58ae6164912f4dc1ded0b)

## [v1.3.6](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.5...v1.3.6) - 2025-02-23

### Commits

- Added Company, position, phone number fields in profile form and enforced MemberRegistrationNumberValidator on registration number [`ba73092`](https://github.com/Pricism/ictc-event-management-system/commit/ba7309261acab0eac949451f34e3af52014fdede)
- Added Carousel on Login page as a default landing page [`02297c5`](https://github.com/Pricism/ictc-event-management-system/commit/02297c5fe4a5741ee2eaeac02cd613d87c83ec08)
- Refactor event state query and improve header layout; update location description in login view [`221bafe`](https://github.com/Pricism/ictc-event-management-system/commit/221bafe328d2f3329d1e3cd0255adc62877363e7)

## [v1.3.5](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.4...v1.3.5) - 2025-02-21

### Fixed

- feat: add searchable Control No. column to BookedEventsList [`#52`](https://github.com/Pricism/ictc-event-management-system/issues/52)

### Commits

- feat: add receipt generation and URL handling to PaymentOrder model and related listeners [`832cc2d`](https://github.com/Pricism/ictc-event-management-system/commit/832cc2df9fbcf4fb2ffbdaaeacca15a333a7edf6)
- feat: add canViewForRecord method to relation managers for event model [`593aa4b`](https://github.com/Pricism/ictc-event-management-system/commit/593aa4b40b8bd45e4503c585ce40faa1b1786039)

## [v1.3.4](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.3...v1.3.4) - 2025-02-20

### Fixed

- feat: add customer details column and replace edit action with view action in PaymentOrderResource [`#50`](https://github.com/Pricism/ictc-event-management-system/issues/50)
- fix: extend expiration period for PaymentOrder to 10 months [`#49`](https://github.com/Pricism/ictc-event-management-system/issues/49)
- feat: enhance BookedEventsList with searchable attendees and event filters [`#48`](https://github.com/Pricism/ictc-event-management-system/issues/48) [`#47`](https://github.com/Pricism/ictc-event-management-system/issues/47)
- fix: add z-index to app header for improved stacking context. [`#36`](https://github.com/Pricism/ictc-event-management-system/issues/36) [`#46`](https://github.com/Pricism/ictc-event-management-system/issues/46)

### Commits

- Fix: The Group booking menu should list group bookings [`815f747`](https://github.com/Pricism/ictc-event-management-system/commit/815f7470de04b49c1f9fce53ad76d4993b5e40ce)
- Fix: Prepopulate the phone number from user account when creating the PaymentOrder [`a1152fd`](https://github.com/Pricism/ictc-event-management-system/commit/a1152fd9cd7e1d6b9514da3f65e8722d97cd886a)
- Reduce the z-index to not block the pop models [`d353ef8`](https://github.com/Pricism/ictc-event-management-system/commit/d353ef8b17de3348ac3c517f3855bd791843e2f9)

## [v1.3.3](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.2...v1.3.3) - 2025-02-13

### Commits

- feat: implement subscriber management with create, unsubscribe, and validation features [`a3397d9`](https://github.com/Pricism/ictc-event-management-system/commit/a3397d9045e5cd488112235170346419ff8d420c)
- feat: enhance payment order view with control number display and invoice download options; poll the server for control number updates [`3b9f498`](https://github.com/Pricism/ictc-event-management-system/commit/3b9f49890b3f3faa0a3e293478c5ca1661efc6bf)
- feat: add loading indicators to event booking and user login views [`eff0d34`](https://github.com/Pricism/ictc-event-management-system/commit/eff0d34b9529b69fa76e467a251395628216c736)

## [v1.3.2](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.1...v1.3.2) - 2025-02-08

### Commits

- feat: add supervisor configuration for queue workers in Docker setup [`3cb19bb`](https://github.com/Pricism/ictc-event-management-system/commit/3cb19bb86577214a248fc3b47b18b258d711b6d4)
- feat: enhance user experience with loading indicators and add supervisor to Docker setup [`f339a66`](https://github.com/Pricism/ictc-event-management-system/commit/f339a66e719861d5d16dd6069dfe07950550cb09)

## [v1.3.1](https://github.com/Pricism/ictc-event-management-system/compare/v1.3.0-alpha...v1.3.1) - 2025-01-29

### Merged

- Block double bookings [`#34`](https://github.com/Pricism/ictc-event-management-system/pull/34)
- Admin dashboard stats [`#26`](https://github.com/Pricism/ictc-event-management-system/pull/26)

### Fixed

- Fix: Improve Event Booking Flow [`#32`](https://github.com/Pricism/ictc-event-management-system/issues/32)
- Fix: Change "Registration Status" to "Professional Registration Status" [`#28`](https://github.com/Pricism/ictc-event-management-system/issues/28)
- Remove "Other" from gender choices [`#27`](https://github.com/Pricism/ictc-event-management-system/issues/27)
- Fix: Coupon Computation Does Not Deduct Partial Amounts (Discounts) [`#23`](https://github.com/Pricism/ictc-event-management-system/issues/23)

### Commits

- Added Gender to Profile and the fix, Fixed responsivenes on the user dashboard and the hover behaviour on sidebar [`41187f0`](https://github.com/Pricism/ictc-event-management-system/commit/41187f0cb9872bb702967daed7f1b0ed67704c6d)
- Added gender field on registration form [`76c5da1`](https://github.com/Pricism/ictc-event-management-system/commit/76c5da14cc0a24915a872f29da80ebe8ca7ff316)
- Added Professional Status and Nationality Form fields on update profile [`54d7208`](https://github.com/Pricism/ictc-event-management-system/commit/54d72081eb8e545dd0452833bf6245b68e486381)

## [v1.3.0-alpha](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.7...v1.3.0-alpha) - 2025-01-20

### Merged

- Reimplement Exhibition Attendees functionality [`#25`](https://github.com/Pricism/ictc-event-management-system/pull/25)
- Add Ticketing Generation After Payments [`#24`](https://github.com/Pricism/ictc-event-management-system/pull/24)
- Add Payment Order Coupons to Incorporate Discounts in the System [`#22`](https://github.com/Pricism/ictc-event-management-system/pull/22)
- Improve Event Booking Flow for Normal Users [`#21`](https://github.com/Pricism/ictc-event-management-system/pull/21)

### Commits

- Add Tickets to Event Model relation manager [`9f92989`](https://github.com/Pricism/ictc-event-management-system/commit/9f92989f90af16881b622c15b866dd3f4b59c0f9)
- Add roles seeder, and set 'user' as the default role [`85aafac`](https://github.com/Pricism/ictc-event-management-system/commit/85aafac621172dd2ecbba34ed907d1688428707f)
- Integrate ExhibitionBooking with Ticketing and add attendee price configuration [`68eae23`](https://github.com/Pricism/ictc-event-management-system/commit/68eae231be3b5472c5ab6e93688b48a63a4d9c68)

## [v1.2.7](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.6...v1.2.7) - 2025-01-17

### Commits

- Added release script [`e7b60c4`](https://github.com/Pricism/ictc-event-management-system/commit/e7b60c4cc34948eae2cb98089e0339789c276963)
- Update release information [`29978c1`](https://github.com/Pricism/ictc-event-management-system/commit/29978c184d79d031a650dec3bd59bec570222877)
- Update release script to include changelog [`f00f00e`](https://github.com/Pricism/ictc-event-management-system/commit/f00f00e4ed6a272b4f488a05f58454e5528de015)

## [v1.2.6](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.5...v1.2.6) - 2025-01-17

### Commits

- Update CHANGELOG.md [`5d74a3d`](https://github.com/Pricism/ictc-event-management-system/commit/5d74a3dd4dd312a2db3c11f7763e946a7d6117af)

## [v1.2.5](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.4...v1.2.5) - 2025-01-17

### Commits

- Aded CHANGELOG.md to the project, and instructions to generate the file [`0d5e138`](https://github.com/Pricism/ictc-event-management-system/commit/0d5e138a54bac68637441ce39a783efa817b8d48)
- Fix Styles on index page [`5fa1cbe`](https://github.com/Pricism/ictc-event-management-system/commit/5fa1cbe298d7fa74c091a3544ee2bfe076b66d9c)
- Fix Event Redirection Error [`3236ff5`](https://github.com/Pricism/ictc-event-management-system/commit/3236ff598f53d607d0f0d7cb8f10d5550aeb5ca6)

## [v1.2.4](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.3...v1.2.4) - 2025-01-17

### Commits

- Fix unavailable events and reviews and Docker build instructions [`acc8942`](https://github.com/Pricism/ictc-event-management-system/commit/acc8942aa698c3be7d17bca29c55f3fdad3e8c0a)

## [v1.2.3](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.2...v1.2.3) - 2025-01-13

### Merged

- Add OTP Authentication to User Accounts [`#20`](https://github.com/Pricism/ictc-event-management-system/pull/20)
- Move Event registration from Modals to a dedicated page [`#19`](https://github.com/Pricism/ictc-event-management-system/pull/19)

### Commits

- Change the wording of some fields and sections [`fb393c4`](https://github.com/Pricism/ictc-event-management-system/commit/fb393c406146d42358584447962a869b1ef723dc)
- Redirect to the newest active event [`c97be2a`](https://github.com/Pricism/ictc-event-management-system/commit/c97be2aace020b9e558e63d2e946cd339180e6ff)

## [v1.2.2](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.1...v1.2.2) - 2024-12-13

### Commits

- Add configuration for apache to aways server from public folder [`35fc0d4`](https://github.com/Pricism/ictc-event-management-system/commit/35fc0d47f11df09648fa7708f09cfaf9248673d7)
- Fix security issue in Docker image [`6a6e79e`](https://github.com/Pricism/ictc-event-management-system/commit/6a6e79e0900adf027c62da39fe49909a147dbf08)

## [v1.2.1](https://github.com/Pricism/ictc-event-management-system/compare/v1.2.0...v1.2.1) - 2024-12-08

### Commits

- Add states to events [`80cfb93`](https://github.com/Pricism/ictc-event-management-system/commit/80cfb93e024cedfdc639cfe011db4232e2c843fd)

## [v1.2.0](https://github.com/Pricism/ictc-event-management-system/compare/v1.1.0...v1.2.0) - 2024-12-07

### Merged

- Improve invoice and payment notifications [`#18`](https://github.com/Pricism/ictc-event-management-system/pull/18)

### Commits

- Add latestEvents view composer to authentication pages [`a5b7af9`](https://github.com/Pricism/ictc-event-management-system/commit/a5b7af99a30da002517b5e30bdb88f5e1e9d27c0)

## [v1.1.0](https://github.com/Pricism/ictc-event-management-system/compare/v1.0.0...v1.1.0) - 2024-12-05

### Merged

- Improving Admin Navigation and Moving Bookings to Relation Managers [`#17`](https://github.com/Pricism/ictc-event-management-system/pull/17)

## v1.0.0 - 2024-11-22

### Merged

- Add Event Reviews [`#16`](https://github.com/Pricism/ictc-event-management-system/pull/16)
- Update queue configuration and  update token header [`#15`](https://github.com/Pricism/ictc-event-management-system/pull/15)
- Payment middleware integration [`#14`](https://github.com/Pricism/ictc-event-management-system/pull/14)
- Exhibition attendees booking [`#13`](https://github.com/Pricism/ictc-event-management-system/pull/13)
- Add exhibition bookings [`#12`](https://github.com/Pricism/ictc-event-management-system/pull/12)
- Decouple payment_order from event_booking [`#5`](https://github.com/Pricism/ictc-event-management-system/pull/5)
- Add event conversations and statistics [`#4`](https://github.com/Pricism/ictc-event-management-system/pull/4)
- Improve fee storage and booking [`#3`](https://github.com/Pricism/ictc-event-management-system/pull/3)
- Adding exhibitor models [`#2`](https://github.com/Pricism/ictc-event-management-system/pull/2)
- Modelling events [`#1`](https://github.com/Pricism/ictc-event-management-system/pull/1)

### Commits

- Initial Commit [`0f1eae1`](https://github.com/Pricism/ictc-event-management-system/commit/0f1eae14f4420f08d9d162116aea6a70862bc3fe)
- Added the Event model [`05d6bf1`](https://github.com/Pricism/ictc-event-management-system/commit/05d6bf16967aa3d99034396ce060cc1c5124a442)
- Show event details in views [`f015508`](https://github.com/Pricism/ictc-event-management-system/commit/f015508b4cc4b15ec1db60f6c8ebfc492b6eed5b)
