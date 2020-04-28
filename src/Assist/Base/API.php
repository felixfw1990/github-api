<?php namespace Github\Assist\Base;

/**
 * ----------------------------------------------------------------------------------
 *  API
 * ----------------------------------------------------------------------------------
 *
 * @author Felix
 * @change 2018/12/20
 */
class API
{
    // ------------------------------------------------------------------------------

    public const SERVER = 'https://api.github.com';

    // gists
    public const GISTS =
    [
        // gists root
        'GGUGists'   => 'users/%s/gists',
        'GGists'     => 'gists',
        'GGGPublic'  => 'gists/public',
        'GGGStarred' => 'gists/starred',
        'GGGists'    => 'gists/%s',
        'GGGSha'     => 'gists/%s/%s',
        'GGGCommits' => 'gists/%s/commits',
        'GGGStar'    => 'gists/%s/star',
        'GGGForks'   => 'gists/%s/forks',

        // comments
        'GCGComments'  => 'gists/%s/comments',
        'GCGComment'   => 'gists/%s/comments/%s',

        //data
        'RORGT'=>'',
    ];

    // git data
    public const DATA =
    [
        //blob
        'RORGBlobs' => '/repos/%s/%s/git/blobs',

        //tree
        'RORGTrees' => '/repos/%s/%s/git/trees',

        //commit
        'RORGCommit'  => '/repos/%s/%s/git/commits/%s',
        'RORGCommits' => '/repos/%s/%s/git/commits',
    ];
    // github apps
    // interactions
    // issues
    // migrations
    // miscellaneous
    // organizations
    // projects
    // pull requests
    // reactions

    // ------------------------------------------------------------------------------

    //repositories
    public const REPOSITORIES =
    [
        // repos root
        'RMRepos'        => 'user/repos',  //
        'RURepos'        => 'users/%s/repos',  //
        'RORepos'        => 'orgs/%s/repos',
        'RRepositories'  => 'repositories',
        'RRRepo'         => 'repos/%s/repo',
        'RRTopics'       => 'repos/%s/%s/topics',
        'RRContributors' => 'repos/%s/%s/contributors',
        'RRLanguages'    => 'repos/%s/%s/languages',
        'RRTeams'        => 'repos/%s/%s/teams',
        'RRTags'         => 'repos/%s/%s/tags',
        'RRDelete'       => 'repos/%s/%s',
        'RRTransfer'     => 'repos/%s/%s/transfer',

        // branches
        'BRBranches'        => 'repos/%s/%s/branches', //
        'BRBBranch'         => 'repos/%s/%s/branches/%s',
        'BRBBProtection'    => 'repos/%s/%s/branches/%s/protection',
        'BRBBPStatus'       => 'repos/%s/%s/branches/%s/protection/required_status_checks',
        'BRBBPSContexts'    => 'repos/%s/%s/branches/%s/protection/required_status_checks/contexts',
        'BRBBPReviews'      => 'repos/%s/%s/branches/%s/protection/required_pull_request_reviews',
        'BRBBPSignatures'   => 'repos/%s/%s/branches/%s/protection/required_signatures',
        'BRBBPAdmins'       => 'repos/%s/%s/branches/%s/protection/enforce_admins',
        'BRBBPRestrictions' => 'repos/%s/%s/branches/%s/protection/restrictions',
        'BRBBPRTeams'       => 'repos/%s/%s/branches/%s/protection/restrictions/teams',
        'BRBBPRUsers'       => 'repos/%s/%s/branches/%s/protection/restrictions/users',

        // collaborators
        'CRCollaborators' => 'repos/%s/%s/collaborators',
        'CRCUser'         => 'repos/%s/%s/collaborators/%s',
        'CRCUPermission'  => 'repos/%s/%s/collaborators/%s/permission',

        // comments
        'CRComments'  => 'repos/%s/%s/comments',
        'CRCComments' => 'repos/%s/%s/commits/%s/comments',
        'CRComment'   => 'repos/%s/%s/commits/%s',

        // commits
        'CRCommits' => 'repos/%s/%s/commits',   //
        'CRCommit'  => 'repos/%s/%s/commits/%s', //
        'CRCompare' => 'repos/%s/%s/compare/%s...%s',

        // commits
        'CRCProfile' => 'repos/%s/%s/community/profile',

        // content
        'CRReadme'        => 'repos/%s/%s/readme',
        'CRContents'      => 'repos/%s/%s/contents/%s', //
        'CRArchiveFormat' => 'repos/%s/%s/%s/%s',

        // deploy keys
        'RDRKeys' => 'repos/%s/%s/keys',
        'RDRKey'  => 'repos/%s/%s/keys/%s',

        // deployments
        // downloads
        // forks
        // invitations
        // merging
        'RORMerges'  => '/repos/%s/%s/merges',

        // pages
        // releases
        'RRRReleases'  => 'repos/%s/%s/releases',
        'RRRRelease'   => 'repos/%s/%s/releases/%s',
        'RRRRLatest'   => 'repos/%s/%s/releases/latest',
        'RRRRTag'      => 'repos/%s/%s/releases/tags/%s',
        'RRRRAssets'   => 'repos/%s/%s/releases/%s/assets',
        'RRRRAsset'    => 'repos/%s/%s/releases/assets/%s',

        // statistics
        // statuses
        // traffic
        // webhooks
    ];

    // search
    // teams
    // scim
    // users

    // ------------------------------------------------------------------------------
}