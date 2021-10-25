<template>
    <adminLayout>
        <div
            class="relative min-w-0 break-words w-full mb-3 shadow-lg rounded bg-white"
        >
            <div class="flex space-x-5 mx-5 py-3">
                <button
                    v-on:click="saveDesign"
                    class="bg-green-600 px-3 py-2 rounded text-white"
                >
                    Design speichern
                </button>
                <button
                    v-on:click="exportHtml"
                    class="bg-green-600 px-3 py-2 rounded text-white"
                >
                    Mail senden
                </button>
            </div>
            <EmailEditor
                :appearance="appearance"
                :min-height="minHeight"
                :project-id="projectId"
                :locale="locale"
                ref="emailEditor"
                v-on:load="editorLoaded"
                class="maileditor"
            />
        </div>
    </adminLayout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
import { EmailEditor } from "vue-email-editor";
export default {
    props: ["contents"],
    components: {
        adminLayout,
        EmailEditor
    },
    data() {
        return {
            minHeight: "100vh",
            locale: {
                "buttons.add_column": "Add column",
                "buttons.add_content": "Add content",
                "buttons.add_display_condition": "Add display condition",
                "buttons.add_field": "Add field",
                "buttons.add_new_field": "Add new field",
                "buttons.add_new_item": "Add new item",
                "buttons.add_row": "Add line",
                "buttons.add_text": "Add text",
                "buttons.apply": "Apply",
                "buttons.apply_effects": "Apply Effects & More",
                "buttons.back": "Back",
                "buttons.background": "Background",
                "buttons.cancel": "Cancel",
                "buttons.change": "Change",
                "buttons.change_image": "Change image",
                "buttons.close": "Close",
                "buttons.corners": "corners",
                "buttons.crop": "Crop",
                "buttons.delete": "Delete",
                "buttons.deselect": "Deselect",
                "buttons.desktop": "Desktop",
                "buttons.done": "Done",
                "buttons.draw": "Draw",
                "buttons.drawing": "Drawing",
                "buttons.duplicate": "Duplicate",
                "buttons.duplication_disabled_usage_limit":
                    "You cannot reproduce this due to a usage restriction",
                "buttons.filter": "Filter",
                "buttons.frame": "frame",
                "buttons.history": "History",
                "buttons.merge": "Merge",
                "buttons.mobile": "Handy",
                "buttons.more_options": "More options",
                "buttons.open": "Open",
                "buttons.remove_column": "Remove column",
                "buttons.reset_value": "Reset value",
                "buttons.resize": "Adjust size",
                "buttons.save": "Save",
                "buttons.select": "Select",
                "buttons.shape": "Shape",
                "buttons.shapes": "Shapes",
                "buttons.show_fewer_options": "Show fewer options",
                "buttons.show_more_options": "Show more options",
                "buttons.sticker": "Sticker",
                "buttons.stickers": "Stickers",
                "buttons.transform": "Transform",
                "buttons.update_field": "Update field",
                "buttons.upload": "Upload",
                "buttons.upload_image": "Upload image",
                "buttons.zoom": "Zoom",
                "colors.black": "Black",
                "colors.ruby": "Ruby",
                "colors.white": "White",
                "content_tools.button": "Button",
                "content_tools.columns": "Columns",
                "content_tools.divider": "Divider",
                "content_tools.form": "Form",
                "content_tools.heading": "Heading",
                "content_tools.html": "HTMLA",
                "content_tools.image": "Image",
                "content_tools.menu": "Menu",
                "content_tools.social": "Social Media",
                "content_tools.text": "Text",
                "content_tools.timer": "Timer",
                "content_tools.video": "Video",
                "editor.action_type.label": "Action type",
                "editor.align.label": "Align",
                "editor.alignment.label": "Alignments",
                "editor.all_sides.label": "All pages",
                "editor.alternate_text.label": "Alternative text",
                "editor.background_color.label": "Background color",
                "editor.background_image.center": "Centering",
                "editor.background_image.cover_mode": "Cover mode",
                "editor.background_image.full_width": "Full width",
                "editor.background_image.label": "Background image",
                "editor.background_image.repeat": "Repeat",
                "editor.border.dashed": "Dashed",
                "editor.border.dotted": "Dotted",
                "editor.border.label": "Rand",
                "editor.border.solid": "Filled",
                "editor.bottom.label": "Below",
                "editor.button_link.label": "Button with link",
                "editor.color.label": "color",
                "editor.colors.label": "Colors",
                "editor.columns_background.label": "Column background",
                "editor.container_padding.label": "Container filling",
                "editor.content_alignment.label": "Content adjustment",
                "editor.content_background_color.label":
                    "Content background color",
                "editor.content_width.label": "Width of the content",
                "editor.digits_color.label": "Digits color",
                "editor.digits_font.label": "Numbers font",
                "editor.digits_font_size.label": "Digits font size",
                "editor.do_not_stack_on_mobile.label":
                    "Do not stack in mobile view",
                "editor.end_time.label": "Endzeit",
                "editor.fields.label": "fields",
                "editor.font_family.label": "Font",
                "editor.font_size.label": "Font size",
                "editor.form.custom": "Custom",
                "editor.form.method": "Method",
                "editor.form_alignment.label": "Alignment of the shape",
                "editor.form_width.label": "Width of the form",
                "editor.full_width.label": "Full width",
                "editor.heading_type.label": "Heading type",
                "editor.height.label": "Height",
                "editor.hide_on_desktop.label": "Hide on desktop",
                "editor.hide_on_mobile.label": "Hide on mobile phone",
                "editor.hover_background.label": "Hover background",
                "editor.hover_color.label": "Hover color",
                "editor.hover_text.label": "Hover-Text",
                "editor.hover_underline.label": "Hover effect with underlining",
                "editor.icon_spacing.label": "Icon spacing",
                "editor.icon_type.label": "Icontyp",
                "editor.image.added_drawing": "Added: Drawing",
                "editor.image.added_frame": "Added: Frame",
                "editor.image.added_overlay_image": "Added: Image overlay",
                "editor.image.added_shape": "Added: Shape",
                "editor.image.added_sticker": "Added: Sticker",
                "editor.image.added_text": "Added: Text",
                "editor.image.applied_crop": "Applied: Crop",
                "editor.image.applied_filter": "Applied: Filter",
                "editor.image.applied_resize": "Applied: Resize",
                "editor.image.applied_rounded_corners":
                    "Applied: Rounded Corners",
                "editor.image.applied_transform": "Applied: Transform",
                "editor.image.auto": "Auto",
                "editor.image.auto_width": "Automatic width",
                "editor.image.auto_width_switch_off":
                    "Turn off automatic width to change the size of the image manually",
                "editor.image.brush_color": "Brush color",
                "editor.image.brush_size": "Brush size",
                "editor.image.brush_type": "Brush type",
                "editor.image.canvas_background": "Canvas background",
                "editor.image.changed_background": "Changed: Background",
                "editor.image.changed_background_image":
                    "Changed: Background image",
                "editor.image.changed_style": "Changed: Style",
                "editor.image.drop_upload":
                    "Drop a new image here or click to select files to upload.",
                "editor.image.full_width_mobile":
                    "Full width on mobile devices",
                "editor.image.image_options": "Image options",
                "editor.image.image_url": "Image URL",
                "editor.image.initial": "Initiale",
                "editor.image.label": "Image",
                "editor.image.loaded_state": "Loaded: Status",
                "editor.image.maintain_aspect_ratio": "Maintain aspect ratio",
                "editor.image.main_image": "main image",
                "editor.image.objects_merged": "Objects: Merged",
                "editor.image.offset_x": "Compensate X",
                "editor.image.offset_y": "Compensate Y",
                "editor.image.outline_width": "Width of the contours",
                "editor.image.uploading": "Uploading",
                "editor.image.upload_error":
                    "There was an error uploading your image. Make sure it is a valid image file that is less than {mbSize} MB.",
                "editor.image.use_percentages": "Use percentages",
                "editor.image_link.label": "Image link",
                "editor.inherit_body_styles.label": "Inheriting body styles",
                "editor.labels_color.label": "Label color",
                "editor.labels_font.label": "Label font",
                "editor.labels_font_size.label": "Label font size",
                "editor.layout.label": "Layout",
                "editor.left.label": "Links",
                "editor.line.label": "line",
                "editor.line_height.label": "Line height",
                "editor.link.body": "body",
                "editor.link.call_phone": "Call phone number",
                "editor.link.mailto": "Send to",
                "editor.link.new_tab": "New tab",
                "editor.link.open_website": "Open website",
                "editor.link.phone": "Telephone",
                "editor.link.same_tab": "Same tab",
                "editor.link.send_email": "Send email",
                "editor.link.send_sms": "Send SMS",
                "editor.link.subject": "Subject",
                "editor.link.target": "Target",
                "editor.link.url": "URL",
                "editor.link_color.label": "Link color",
                "editor.margin.label": "Rand",
                "editor.mobile.description":
                    "You are currently editing for mobile devices. Switch to desktop to get access to all design options.",
                "editor.padding.label": "Embedding",
                "editor.placeholder.text":
                    "There is no content here. Drag content in from the right.",
                "editor.placeholder.text.left":
                    "No content here. Drag the content from the left.",
                "editor.play_icon_color.label": "Color of the play icon",
                "editor.play_icon_size.label": "Size of the play icon",
                "editor.play_icon_type.label": "Type of play icon",
                "editor.preheader_text.description":
                    "A preheader is a short summary text that follows the subject line when an e-mail is displayed in the inbox.",
                "editor.preheader_text.label": "Preheader-Text",
                "editor.right.label": "Right",
                "editor.rounded_border.label": "Rounded corners",
                "editor.separator.label": "Separator",
                "editor.social_links.label": "Links to social media",
                "editor.space_between_fields.label": "Distance between fields",
                "editor.submit_action.label": "Submit action",
                "editor.text.label": "Text",
                "editor.text_align.label": "Text alignment",
                "editor.text_color.label": "Text color",
                "editor.top.label": "Above",
                "editor.underline.label": "Underline",
                "editor.video.arrow_only": "Arrow only",
                "editor.video.video_camera": "Videokamera",
                "editor.video_url.description":
                    "Add a YouTube or Vimeo URL to automatically generate a preview image. The image will be linked to the stored URL.",
                "editor.video_url.label": "Video-URL",
                "editor.width.label": "Width",
                "editors_panel.title.content": "Content",
                "editors_panel.title.contents": "Content",
                "editors_panel.title.rows": "line",
                "fields.birthday": "birthday",
                "fields.company": "company",
                "fields.name": "Name",
                "fields.phone_number": "phone number",
                "fields.website": "website",
                "fields.zip_code": "ZIP code",
                "labels.align_text": "Align text",
                "labels.blur": "Blur",
                "labels.category": "Category",
                "labels.color_picker": "color pipette",
                "labels.desktop_preview": "Desktop preview",
                "labels.device_override": "This device overwrites values",
                "labels.display_conditions": "display conditions",
                "labels.editor": "Editor",
                "labels.font": "Font",
                "labels.format_text": "Format text",
                "labels.google_fonts": "Google Fonts",
                "labels.gradient": "Gradient",
                "labels.horizontal": "Horizontal",
                "labels.language": "Language",
                "labels.loading": "Loading",
                "labels.loading_images": "Loading images",
                "labels.load_more": "Load more",
                "labels.merge_tags": "Merge tags",
                "labels.mobile_preview": "Mobile phone preview",
                "labels.no_images": "No images",
                "labels.no_results": "No results",
                "labels.objects": "Objects",
                "labels.outline": "outline",
                "labels.page": "Page",
                "labels.radius": "Radius",
                "labels.redo": "Restore",
                "labels.search": "Search",
                "labels.search_images": "Search millions of images",
                "labels.shadow": "shadow",
                "labels.size": "size",
                "labels.special_links": "Special Links",
                "labels.stock_photos_by":
                    "With the support of Unsplash, Pexels, Pixabay.",
                "labels.stock_photos_license":
                    "All images are licensed under Creative Commons Zero.",
                "labels.tags": "Tags",
                "labels.texture": "structure",
                "labels.text_style": "Text style",
                "labels.timezone": "Timezone",
                "labels.undo": "Cancel",
                "labels.vertical": "Vertical",
                "modals.category.invalid": "This is an invalid category name",
                "modals.category.placeholder": "Category name",
                "modals.delete.columns":
                    "You will lose {columns, number} {columns, plural, one {column} other {columns}}. Are you sure?",
                "modals.delete.confirmation":
                    "Are you sure you want to delete this item? This action cannot be undone.",
                "modals.delete.title": "Delete",
                "modals.display_conditions.title": "Select a display condition",
                "modals.preview.title": "Preview",
                "modals.save_block.title": "Save block",
                "modals.tags.description":
                    "Tags are used for the search. Multiple tags can be separated with a comma.",
                "modals.tags.placeholder": "Tag1, Tag2",
                "option_groups.action.title": "Aktion",
                "option_groups.all.title": "All",
                "option_groups.blank.title": "Empty",
                "option_groups.button.title": "Button",
                "option_groups.button_options.title": "Button options",
                "option_groups.colors.title": "Colors",
                "option_groups.columns.title": "Columns",
                "option_groups.column_number.title": "Column {number}",
                "option_groups.column_properties.title": "Column properties",
                "option_groups.countdown.title": "Countdown",
                "option_groups.default.title": "General",
                "option_groups.display_condition.title": "Display condition",
                "option_groups.email_settings.title": "E-Mail Settings",
                "option_groups.fields.title": "Fields",
                "option_groups.form.title": "Form",
                "option_groups.html.title": "HTMLA",
                "option_groups.icons.title": "Icons",
                "option_groups.image.title": "Image",
                "option_groups.labels.title": "Label",
                "option_groups.last_saved.title": "Last saved",
                "option_groups.layout.title": "Layout",
                "option_groups.line.title": "Line",
                "option_groups.link.title": "Link",
                "option_groups.links.title": "Links",
                "option_groups.menu_items.title": "Menu items",
                "option_groups.mobile.title": "Mobile",
                "option_groups.responsive_design.title": "Responsive Design",
                "option_groups.row_properties.title": "Series properties",
                "option_groups.size.title": "Size",
                "option_groups.spacing.title": "Spacing",
                "option_groups.styles.title": "Designs",
                "option_groups.text.title": "Text",
                "shapes.circle": "circle",
                "shapes.rectangle": "rectangle",
                "shapes.round": "Round",
                "shapes.square": "square",
                "sizes.large": "large",
                "sizes.largest": "Largest",
                "sizes.medium": "Medium",
                "sizes.small": "Small",
                "sizes.smallest": "smallest",
                "tools.form.field_label": "Field label",
                "tools.form.field_name": "Field name",
                "tools.form.field_type": "Field type",
                "tools.form.field_value": "Field value",
                "tools.form.new_field": "New field",
                "tools.form.options_one_per_line": "Options (one per line)",
                "tools.form.placeholder_text": "Placeholder text",
                "tools.form.required_field": "Mandatory field",
                "tools.form.show_label": "Show label",
                "tools.form.update_field": "Update field",
                "tools.social.click_icons_to_add": "Click on the icons to add",
                "tools.tabs.blocks": "Blocks",
                "tools.tabs.body": "Body",
                "tools.tabs.content": "Content",
                "tools.tabs.images": "Images",
                "tools.tabs.row": "line",
                "tools.tabs.uploads": "Uploads",
                "tools.text.personalize": "Personalize"
            },
            email: "",
            locale: null,
            projectId: 0,
            appearance: {
                theme: "dark",
                panels: {
                    tools: {
                        dock: "right"
                    }
                }
            }
        };
    },
    methods: {
        editorLoaded() {
            // Pass the template JSON here
            // this.$refs.emailEditor.editor.loadDesign({});
        },
        saveDesign() {
            this.$refs.emailEditor.editor.saveDesign(design => {
                this.email = design;
            });
        },
        exportHtml() {
            this.$refs.emailEditor.editor.exportHtml(data => {
                console.log("exportHtml", data);
            });
        }
    }
};
</script>

<style>
.maileditor {
    height: 80vh;
    width: 100%;
}
</style>
