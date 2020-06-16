import { registerBlockType } from "@wordpress/blocks";
import ServerSideRender from "@wordpress/server-side-render";

registerBlockType( "yoast-seo/siblings", {
	title: "Siblings",
	icon: "editor-ul",
	category: "yoast-internal-linking-blocks",

	edit: function( props ) {
		return (
			<ServerSideRender
				block="yoast-seo/siblings"
				attributes={ props.attributes }
			/>
		);
	},
	save: function() {
		return null;
	},
} );

registerBlockType( "yoast-seo/subpages", {
	title: "Subpages",
	icon: "editor-ul",
	category: "yoast-internal-linking-blocks",

	edit: function( props ) {
		return (
			<ServerSideRender
				block="yoast-seo/subpages"
				attributes={ props.attributes }
			/>
		);
	},
	save: function() {
		return null;
	},
} );
